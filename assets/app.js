/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/sass/app.scss"

// start the Stimulus application
import "./bootstrap"

import { createApp } from "vue"
import { createI18n } from "vue-i18n"

const i18n = createI18n({
    // something vue-i18n options here ...
    locale: "it", // set locale
    fallbackLocale: "en", // set fallback locale
})

import App from "./App.vue"
import router from "./router"
createApp(App).use(router).use(i18n).mount("#app")
