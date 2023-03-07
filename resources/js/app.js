import { createApp, h} from 'vue'
import Vue from 'vue'

import { createInertiaApp } from '@inertiajs/vue3'

import bootstrap from 'bootstrap/dist/css/bootstrap.css'

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(bootstrap)
      .mount(el)
  },
})
