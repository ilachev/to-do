<template>
  <div>
    <ul v-if="todosLength === 0">
      <li>Пусто</li>
    </ul>
    <ul v-else>
      <template v-for="(todo, index) in todos">
        <todo-item
            :key="`todo--${index}`"
            :data="todo"
            :index="index"
            :total="todosLength"
        />
      </template>
    </ul>
    <ul>
      <button @click="addTodo">
        Добавить
      </button>
    </ul>
  </div>
</template>

<script>
import { mapState } from "vuex";
import TodoItem from "./todo-item.vue";
export default {
  name: "todo-list",
  components: {
    "todo-item": TodoItem,
  },
  methods: {
    addTodo() {
      this.$store.dispatch("addTodo", this.todos[this.todosLength - 1]);
    },
  },
  computed: {
    ...mapState({
      todos: (state) => {
        return state.todos;
      },
      todosLength: (state) => {
        return state.todos.length;
      },
    }),
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.todo-list {
  margin: 10px;
}
.no-todos-notice {
  padding: 20px;
  span {
    font-weight: 600;
    margin-left: 10px;
  }
}
.btn-panel {
  padding: 20px;
}
</style>