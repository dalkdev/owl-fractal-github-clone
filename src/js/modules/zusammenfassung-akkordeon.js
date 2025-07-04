export function initZusammenfassungAkkordeon() {
  document.querySelectorAll('[data-accordion-toggle]').forEach(button => {
    button.addEventListener('click', () => {
      const content = button.nextElementSibling;
      const icon = button.querySelector('[data-accordion-icon]');

      // Toggle Inhalt anzeigen/verstecken
      const isOpen = !content.classList.contains('nw-hidden');
      content.classList.toggle('nw-hidden');
      icon.classList.toggle('nw-rotate-180');

      // wenn ich das Element öffne das border-b hidden
      if (isOpen) {
        button.classList.add('nw-rounded-b');
      } else {
        button.classList.remove('nw-rounded-b');
      }
    });
  });
}