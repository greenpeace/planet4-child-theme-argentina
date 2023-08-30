(() => {
	document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.createElement('div');
    wrapper.className = 'popup-wrapper';

    const content = document.createElement('div');
    content.className = 'content';

    const title_1 = document.createElement('h1');
    title_1.innerHTML = 'BASTA DE IMPUNIDAD';
    title_1.className = 'highlighted';
    const text = document.createElement('p');
    text.innerHTML = 'Si todavía no votaste en la Consulta Popular por los bosques, podés hacerlo ahora';

    const link = document.createElement('a');
    link.className = 'btn-cta';
    link.target='_blank';
    link.setAttribute('href', 'https://votaporlosbosques.org/?utm_source=web&utm_medium=os&utm_content=PopUpWeb&utm_term=todos&utm_campaign=ConsultaPopularBosques');
    link.innerHTML = 'VOTÁ AHORA';

    const xButton = document.createElement('div');
    xButton.className = 'x-button';
    xButton.innerHTML = 'X';
    xButton.addEventListener('click', function() {
      document.body.removeChild(document.querySelector('.popup-wrapper'));
    })

    wrapper.appendChild(content);
    content.appendChild(title_1);
    content.appendChild(text);
    content.appendChild(link);
    content.appendChild(xButton);
    document.body.appendChild(wrapper);
  });

  setTimeout(() => {
    document.body.removeChild(document.querySelector('.popup-wrapper'));
  }, 20000);
})();
