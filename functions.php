<?php

/**
 * Additional code for the child theme goes in here.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 99);

function enqueue_child_styles() {
	$css_creation = filectime(get_stylesheet_directory() . '/style.css');

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [], $css_creation );
}

wp_register_script( 'render-fixed-donate-button', '' );
wp_enqueue_script( 'render-fixed-donate-button' );
wp_add_inline_script(
    'render-fixed-donate-button',
    '
        (() => {
            document.addEventListener("DOMContentLoaded", () => {
                const renderOrRemoveMobileDonateButton = () => {
                    const navMain = document.querySelector("#nav-main");

                    try {
                        const donateButtonBottomHeader = document.querySelector(".donate-button-bottom-header");

                        if(window.innerWidth < 768) {
                            if(donateButtonBottomHeader === null) {
                                const donateButton = navMain
                                .querySelector(".burger-menu-footer")
                                .querySelector(".btn-donate")
                                .cloneNode(true);

                                const donateButtonWrapper = document.createElement("div");
                                donateButtonWrapper.className = "donate-button-bottom-header";
                                donateButtonWrapper.style.width = "100%";
                                donateButtonWrapper.style.textAlign = "center";
                                donateButtonWrapper.style.padding = "20px 0 20px 0";
                                donateButtonWrapper.appendChild(donateButton);
                                const header = document.querySelector("#header");
                                header.appendChild(donateButtonWrapper);
                                document.querySelector(".page-content.no-page-title").style.paddingTop = `${header.getBoundingClientRect().height}px`;
                            }
                        } else {
                            if(donateButtonBottomHeader) {
                                donateButtonBottomHeader.remove();
                                document.querySelector(".page-content.no-page-title").style.paddingTop = "68px";
                            }
                        }
                    } catch(error) {
                        // Do nothing
                    }
                };

                window.addEventListener("resize", () => {
                    renderOrRemoveMobileDonateButton();
                });

                renderOrRemoveMobileDonateButton();
            });
        })();
    ',
);
