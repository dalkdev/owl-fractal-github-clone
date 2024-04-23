import {initPolyfills} from './global/polyfills';
import {initSliders} from './modules/embla-slider';
// eslint-disable-next-line no-unused-vars
import {initNavigation} from './modules/embla-navigation';
import {initNewsticker} from './modules/embla-newsticker';
import {initBurgermenu} from './modules/burger-menu';
import {initStickymenu} from './modules/sticky-menu';
import {initFAQ} from './modules/faqElement';
import {initTransform} from './modules/kommentare';
//import {initPrivacybox} from "./modules/privacy-box";
import {initModalbox} from "./modules/modal-box";
import {initGLightBox} from "./modules/glightbox";
import {initDirektZumThema} from "./modules/direkt-zum-thema";
import {initLesepaten} from "./modules/lesepaten";

let adIsTriggered = false;

// These will be immediately called
const preloadFunctions: Array<() => void> = [initPolyfills];

// These will be called after DOMContentLoaded event
const initializationFunctions: Array<() => void> = [
    initSliders,
    initNavigation,
    initNewsticker,
    initBurgermenu,
    initStickymenu,
    initFAQ,
    initTransform,
//    initPrivacybox,
    initModalbox,
    initGLightBox,
    initDirektZumThema,
    initLesepaten,
//    initLightBox,

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
