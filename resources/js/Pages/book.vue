<template>
  <div
    class="container"
    style="
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      margin: 50px;
    "
  >
    <div style="align-items: center">
      <img
        src="http://placeimg.com/480/640/any"
        alt="Card image cap"
        style="height: 50vh"
      />
      <div style="margin-top: 50px">
        <h4>{{ book["title"] }}</h4>
        <h6>Author : {{ book["author"] }}</h6>
        <h6>Publisher : {{ book["publisher"] }}</h6>
        <h6>Genre : {{ book["genre"] }}</h6>
        <h6>Published at : {{ book["published"] }}</h6>
        <h6>Genre : {{ book["genre"] }}</h6>
        <h6>ISBN : {{ book["isbn"] }}</h6>
        <h6>{{ book["description"] }}</h6>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from "vue";
defineProps({ book: Object });
</script>
