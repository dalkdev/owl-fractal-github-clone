import { initPolyfills } from './global/polyfills';
import { initSlider } from './modules/slider';

console.log('app.ts loaded!');

// These will be immediately called
const preloadFunctions: Array<() => void> = [initPolyfills];

// These will be called after DOMContentLoaded event
const initializationFunctions: Array<() => void> = [initSlider];

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
