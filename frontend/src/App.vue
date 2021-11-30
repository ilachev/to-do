<template>
  <div>
    <div>
      <div>
        <h1>Todo List</h1>
      </div>
    </div>
    <div>
      <div>
        <router-view />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "app",
};
</script>