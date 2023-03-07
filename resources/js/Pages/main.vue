<template>
  <div style="height: 50vh; display: flex; align-items: center; justify-content: center">
    <div style="align-items: center">
      <img
        class="td-retina-data"
        data-retina="https://hub.packtpub.com/wp-content/uploads/2022/10/retina-logo.png"
        src="https://hub.packtpub.com/wp-content/uploads/2022/10/normal-logo.png"
        alt="Packt Hub"
        title="Packt Hub"
        width="272"
        height="90"
      />
      <div
        class="input-group my-10"
        style="margin: 0 auto; width: 50vw; border: 2px solid #000; border-radius: 10px"
      >
        <input
          type="text"
          class="form-control"
          v-model="search"
          placeholder="Search Books..."
        />
      </div>
    </div>
  </div>
  <div class="container my-10">
    <div class="row row-cols-3 g-2">
      <div class="col" v-for="book in books" :key="book['_id']">
        <div class="card">
          <img
            class="card-img-top"
            :src="book['_source']['image']"
            alt="Card image cap"
          />
          <div class="card-body">
            <h5 class="card-title">{{ book["_source"]["title"] }}</h5>
            <h6 class="card-title">Author:{{ book["_source"]["author"] }}</h6>
            <h6 class="card-title">Publisher:{{ book["_source"]["publisher"] }}</h6>
            <h6 class="card-title">Genre:{{ book["_source"]["genre"] }}</h6>
            <h6 class="card-title">Published at:{{ book["_source"]["published"] }}</h6>
            <button class="btn btn-link" @click="goto(book['_source']['id'])">
              See Detail
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from "vue";
// import {Inertia} from "@inertiajs/inertia";
import { router, Link } from "@inertiajs/vue3";

defineProps({ books: Object });

let search = ref("");

watch(search, (value) => {
  router.get(
    "/",
    {
      search: value,
    },
    {
      preserveState: true,
    }
  );
});

function goto(id) {
  router.get(
    "/book/",
    {
      id: id,
    },
    {
      preserveState: true,
    }
  );
}
</script>
