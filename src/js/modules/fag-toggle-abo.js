export function initFAQToggleAbo() {
  document.querySelectorAll('.faq-toggle-abo').forEach(toggle => {
    toggle.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = this.getAttribute('data-target');
      const content = document.getElementById(targetId);
      const arrow = this.querySelector('.faq-arrow');
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      // Close all other FAQ items
      document.querySelectorAll('.faq-toggle-abo').forEach(otherToggle => {
        if (otherToggle !== this) {
          const otherTargetId = otherToggle.getAttribute('data-target');
          const otherContent = document.getElementById(otherTargetId);
          const otherArrow = otherToggle.querySelector('.faq-arrow');
          if (otherContent) {
            otherContent.classList.add('nw-hidden');
          }
          if (otherArrow) {
            otherArrow.classList.remove('nw-rotate-180');
          }
          otherToggle.setAttribute('aria-expanded', 'false');
        }
      });
      // Toggle current FAQ item
      if (isExpanded) {
        content.classList.add('nw-hidden');
        arrow.classList.remove('nw-rotate-180');
        this.setAttribute('aria-expanded', 'false');
      } else {
        content.classList.remove('nw-hidden');
        arrow.classList.add('nw-rotate-180');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
}
