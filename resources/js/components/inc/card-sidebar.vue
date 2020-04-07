<script>
  export default {
    props: ['fields','card']
  }
</script>

<template>
  <aside class="sidebar">

        <component
         v-for="field in fields"
         v-bind:is="'input-' + field.type"
         v-bind:field="field"
         :key="field.id">
        </component>

        <button class="button__block button--export" title="Download" id="export" v-on:click="$emit('save')">Save</button>

      </aside>
</template>

<style>
.sidebar {
  width: 30%;
  flex: 0 0 30%;
  margin: 2em 0;
}

.input-group {
  margin-bottom: 1em;

  label {
    font-size: 1em;
  }
}
.radio-group {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  margin-bottom: $small-spacing;

  label {
    font-weight: 400;
    font-size: 1em;
  }
}

label a {
  float: right;
  display: inline-block;
  color: white;
  font-size: 0.8em;
  font-weight: 400;
}

.radio-option {
  display: flex;
  flex-direction: row;
}

input[type="radio"] {
  float: left;
}

.remaining-chars {
  font-size: 0.6em;
  font-weight: 400;
  float: right;
  line-height: $base-spacing;
}

.dropbox {
  outline: 2px dashed #ccc; /* the dash box */
  outline-offset: -10px;
  background: rgba(255,255,255,.75);
  color: #ccc;
  padding: $base-spacing;
  min-height: 120px; /* minimum height */
  position: relative;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}

.input-file {
  opacity: 0; /* invisible but it's there! */
  width: 100%;
  height: 100%;
  position: absolute;
  cursor: pointer;
}

.dropbox:hover {
  background: rgba(255,255,255,.75); /* when mouse over to the drop zone, change color */
}

.dropbox p {
  text-align: center;
  margin-bottom: 0;
}

</style>
