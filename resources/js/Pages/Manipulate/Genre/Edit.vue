<template>
    <app-layout :title="genre.title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editando Gênero de Livro: {{ genre.title }}
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
                                        <label for="title" class="block text-lg font-medium text-gray-700">Título</label>
                                        <input type="text" name="title" id="title" autocomplete="title" v-model="form.title" class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                        <small>Título do genero de livros</small>
                                        <div v-if="errors.title" class="my-2 text-center bg-red-100 border border-red-300 rounded-full">{{ errors.title }}</div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="description" class="block text-lg font-medium text-gray-700">Localização</label>
                                        <textarea name="description" id="description" cols="30" rows="10" v-model="form.description" autocomplete="description" class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                        <small>Locallização da Prateleira de Livros dentro do ambiente físico</small>
                                        <div v-if="errors.description" class="my-2 text-center bg-red-100 border border-red-300 rounded-full">{{ errors.description }}</div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="bookshelf_id" class="block text-lg font-medium text-gray-700">Prateleira</label>
                                        <select id="bookshelf_id" name="bookshelf_id" autocomplete="bookshelf_id" v-model="form.bookshelf_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                                            <option v-for="bookshelf in bookshelves" :key="bookshelf.id" :value="bookshelf.id">{{ bookshelf.location }}</option>
                                        </select>
                                        <small>Prateleira que irá conter o genero</small>
                                        <div v-if="errors.bookshelf_id" class="my-2 text-center bg-red-100 border border-red-300 rounded-full">{{ errors.bookshelf_id }}</div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="active" class="block text-lg font-medium text-gray-700">Ativo?</label>
                                        <select id="active" name="active" autocomplete="active" v-model="form.active" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                        <small>Definição de status da Prateleira de Livros</small>
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
            genre: Object,
            bookshelves: Object,
        },
        data() {
            return {
                form: this.$inertia.form({
                    title: this.genre.title,
                    description: this.genre.description,
                    active: this.genre.active,
                    bookshelf_id: this.genre.bookshelf_id,
                })
            }
        },
        methods: {
            submit() {
                this.form.put(this.route('manipulate.genres.update', this.genre.id), this.genre)
            }
        }
    })
</script>