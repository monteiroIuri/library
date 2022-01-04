<template>
    <app-layout :title="book.name">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editando Livro: {{ book.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="name" class="block text-lg font-medium text-gray-700">Nome</label>
                                        <input type="text" name="name" id="name" autocomplete="name" v-model="form.name" class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        <small>Título do Livro</small>
                                        <div v-if="errors.name" class="my-2 text-center bg-red-100 border border-red-300 rounded-full">{{ errors.name }}</div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="abstract" class="block text-lg font-medium text-gray-700">Resumo</label>
                                        <textarea name="abstract" id="abstract" cols="30" rows="10" v-model="form.abstract" autocomplete="abstract" class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                        <small>Resumo do livro (Abstrato)</small>
                                        <div v-if="errors.abstract" class="my-2 text-center bg-red-100 border border-red-300 rounded-full">{{ errors.abstract }}</div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="amount" class="block text-lg font-medium text-gray-700">Quantidade</label>
                                        <input type="number" name="amount" id="amount" autocomplete="amount" v-model="form.amount" class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required min="1">
                                        <small>Quantidade do livro (estoque)</small>
                                        <div v-if="errors.amount" class="my-2 text-center bg-red-100 border border-red-300 rounded-full">{{ errors.amount }}</div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="genre_id" class="block text-lg font-medium text-gray-700">Genero</label>
                                        <select id="genre_id" name="genre_id" autocomplete="genre_id" v-model="form.genre_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                                            <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.title }}</option>
                                        </select>
                                        <small>Genero do Livro</small>
                                        <div v-if="errors.genre_id" class="my-2 text-center bg-red-100 border border-red-300 rounded-full">{{ errors.genre_id }}</div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="active" class="block text-lg font-medium text-gray-700">Ativo?</label>
                                        <select id="active" name="active" autocomplete="active" v-model="form.active" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                        <small>Definição de status do Livro</small>
                                        <div v-if="errors.active" class="my-2 text-center bg-red-100 border border-red-300 rounded-full">{{ errors.active }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                    ENVIAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default defineComponent({
        components: {
            AppLayout,
        },
        props: {
            errors: Object,
            book: Object,
            genres: Object,
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: this.book.name,
                    abstract: this.book.abstract,
                    amount: this.book.amount,
                    active: this.book.active,
                    genre_id: this.book.genre_id,
                })
            }
        },
        methods: {
            submit() {
                this.form.put(this.route('manipulate.books.update', this.book.id), this.book)
            }
        }
    })
</script>
