export function initArticleSummary() {
  document.querySelectorAll('[data-article-summary-toggle]').forEach(button => {
    const content = button.nextElementSibling;
    const chevron = button.querySelector('[data-article-summary-chevron]');
    const uniqueId = 'article-summary-' + Math.random().toString(36).substr(2, 9);
    
    // Set up accessibility attributes
    button.setAttribute('aria-expanded', 'false');
    button.setAttribute('aria-controls', uniqueId);
    content.setAttribute('id', uniqueId);
    
    button.addEventListener('click', () => {
      const isExpanded = button.getAttribute('aria-expanded') === 'true';
      
      if (isExpanded) {
        // Collapse
        content.classList.add('nw-hidden');
        chevron.classList.remove('nw-rotate-180');
        button.setAttribute('aria-expanded', 'false');
        button.classList.add('nw-rounded-b');
      } else {
        // Expand
        content.classList.remove('nw-hidden');
        chevron.classList.add('nw-rotate-180');
        button.setAttribute('aria-expanded', 'true');
        button.classList.remove('nw-rounded-b');
      }
    });
  });
}