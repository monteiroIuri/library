<template>
    <app-layout title="Gêneros de Livros">
        <template #header>
            <h2 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
                Gêneros de Livros
            </h2>
            <a class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" :href="route('manipulate.genres.create')">
                CRIAR NOVO GÊNERO LIVRO
            </a>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid justify-items-center">
                    <table v-if="genres.length" class="bg-gray-100 my-5 inline-block shadow-lg">
                        <thead class="rounded">
                            <th class="bg-purple-100 px-8 py-4 border border-purple-200">#</th>
                            <th class="bg-purple-100 px-8 py-4 border border-purple-200">Título</th>
                            <th class="bg-purple-100 px-8 py-4 border border-purple-200">Descrição</th>
                            <th class="bg-purple-100 px-8 py-4 border border-purple-200">Prateleira</th>
                            <th class="bg-purple-100 px-8 py-4 border border-purple-200">Ativo</th>
                            <th class="bg-purple-100 px-8 py-4 border border-purple-200">Data da última edição</th>
                            <th class="bg-purple-100 px-8 py-4 border border-purple-200">Data de criação</th>
                            <th class="bg-purple-100 px-8 py-4 border border-purple-200">AÇÕES</th>
                        </thead>
                        <tbody>
                            <tr v-for="genre in genres" :key="genre.id">
                                <td class="px-4 py-2 text-center border border-gray-200 font-bold">{{ genre.id }}</td>
                                <td class="px-4 py-2 text-center border border-gray-200">{{ genre.title }}</td>
                                <td class="px-4 py-2 text-center border border-gray-200">{{ genre.description }}</td>

                                <td class="px-4 py-2 text-center border border-gray-200">{{ genre.bookshelf.location }}</td>

                                <td v-if="genre.active == 1" class="inline-flex grid justify-items-center">
                                    <p class="mt-2 p-2 text-center text-white border bg-green-600 border-green-800 rounded-full">Sim</p>
                                </td>
                                <td v-else class="inline-flex grid justify-items-center">
                                    <p class="mt-2 p-2 text-center text-white border bg-red-600 border-red-800 rounded-full">Não</p>
                                </td>
                                <td class="px-4 py-2 text-center border border-gray-200 font-semibold leading-tight">{{ new Date(genre.created_at).toLocaleDateString('pt-BR') }}</td>
                                <td class="px-4 py-2 text-center border border-gray-200 font-semibold leading-tight">{{ new Date(genre.updated_at).toLocaleDateString('pt-BR') }}</td>
                                <td class="px-4 py-2 text-center border border-gray-200">
                                    <a class="m-1 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" :href="route('manipulate.genres.edit', genre.id)">
                                        EDITAR
                                    </a>
                                    <button class="m-1 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" @click.prevent="destroy(genre.id)" type="button">
                                        DELETAR
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-else class="mt-3 text-center grid justify-items-center">
                        <h2 class="mb-4 font-semibold text-xl text-gray-800 leading-tight bg-grey-100">
                            Não foi adicionado dados até o momento, por favor, clique em Criar Novo Gênero para inserir novos dados.
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
            genres: Array,
        },
        methods: {
            destroy(id) {
                this.$inertia.delete(this.route('manipulate.genres.destroy', id))
            }
        }
    })
</script>