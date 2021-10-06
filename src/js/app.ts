import { initPolyfills } from './global/polyfills';
import { initSliders } from './modules/embla-slider';

// These will be immediately called
const preloadFunctions: Array<() => void> = [initPolyfills];

// These will be called after DOMContentLoaded event
const initializationFunctions: Array<() => void> = [initSliders];

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
