<template>
    <app-layout title="Visualizando Livro">
        <template #header>
            <h2 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
                {{ book.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid justify-items-center">
                    <div class="mt-3 text-center grid justify-items-center">
                        <h2 class="mb-4 font-bold text-gray-800 leading-tight bg-grey-100">
                            <p class="text-6xl">Informações do livro</p>
                            <div class="text-left">
                                <p class="text-2xl"><strong class="text-4xl">Nome</strong>: {{ book.name }}</p>
                                <p class="text-2xl"><strong class="text-4xl">Resumo</strong>: {{ book.abstract }}</p>
                                <p class="text-2xl"><strong class="text-4xl">Quantidade</strong>: {{ book.amount }}</p>
                                <p class="text-2xl"><strong class="text-4xl">Ativo</strong>: {{ book.active }}</p>
                            </div>
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
            book: Array,
        }
    })
</script>