<template>
	<div class="list-rendering">
        <ul>
            <li v-for="(todo, index) in todos" :key="index" v-if="!todo.isComplete">
              {{ todo.name }} - {{ todo.isComplete }}
            </li>
        </ul>
	</div>
</template>

<script>
    export default {
        data() {
            return {
                todos: [
                    {
                        name: 'to do 1',
                        isComplete: true
                    },
                    {
                        name: 'to do 2',
                        isComplete: false
                    },
                    {
                        name: 'to do 3',
                        isComplete: true
                    },
                ]
            }
        }
    }
</script>
