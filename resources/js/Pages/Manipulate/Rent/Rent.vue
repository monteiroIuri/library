<template>
    <app-layout title="Generos de Livros">
        <template #header>
            <h2 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
                Alugar Livros
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid justify-items-center">
                    <div v-if="books.length" class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        <div v-for="book in books" :key="book.id" class="group relative border rounded-lg p-2 m-4">
                            <div class="w-full text-center bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:aspect-none">
                                <p class="text-2xl px-2"><strong>{{ book.name }}</strong></p>
                                <p class="text-md px-2">{{ book.abstract }}</p>
                                <p class="text-sm px-2">{{ book.amount }}</p>
                            </div>
                            <div class="mt-4 flex justify-center my-3">
                                <div v-if="book.user_id == user.id && book.amount == 0 || book.user_id == user.id">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" @click.prevent="unrent( user.id, book.id)">
                                        DEVOLVER
                                    </button>
                                </div>
                                <div v-else-if="book.amount == 0">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 cursor-not-allowed" disabled @click.prevent="rent( user.id, book.id)">
                                        ALUGAR
                                    </button>
                                </div>
                                <div v-else-if="book.user_id != user.id">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" @click.prevent="rent( user.id, book.id)">
                                        ALUGAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="mt-3 text-center grid justify-items-center">
                        <h2 class="mb-4 font-semibold text-xl text-gray-800 leading-tight bg-grey-100">
                            Estamos sem Livros no momento.
                        </h2>
                    </div>
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
            books: Array,
            user: Array,
        },
        methods: {
            unrent(user_id, book_id) {
                this.$inertia.delete(this.route('manipulate.rents.unrent', {'user_id': user_id, 'book_id': book_id}))
            },
            rent(user_id, book_id) {
                this.$inertia.post(this.route('manipulate.rents.rent', {'user_id': user_id, 'book_id': book_id}))
            }
        }
    })
</script>

<style scoped>

</style>