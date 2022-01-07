import { initPolyfills } from './global/polyfills';
import { initSliders } from './modules/embla-slider';
import { initNavigation } from './modules/embla-navigation';
import { initNewsticker } from './modules/embla-newsticker';
import { initBurgermenu } from './modules/burger-menu';
import { initStickymenu } from './modules/sticky-menu';

// These will be immediately called
const preloadFunctions: Array<() => void> = [initPolyfills];

// These will be called after DOMContentLoaded event
const initializationFunctions: Array<() => void> = [
  initSliders,
  initNavigation,
  initNewsticker,
  initBurgermenu,
  initStickymenu,
];

preloadFunctions.forEach(initializationFunction => {
  try {
    initializationFunction.call(this);
  } catch (error) {
    console.error(error);
  }
});

document.addEventListener('DOMContentLoaded', () => {
  initializationFunctions.forEach(initializationFunction => {
    try {
      initializationFunction.call(this);
    } catch (error) {
      console.error(error);
    }
  });
});
