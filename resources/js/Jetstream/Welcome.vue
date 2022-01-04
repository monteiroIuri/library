<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

            <div class="mt-8 text-2xl">
                Vamos criar uma dashboard para nosso sistema de biblioteca!
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-6 bg-blue-200 bg-opacity-25 ">

                <div class="ml-12">
                    <div class="mt-2 text-5xl text-gray-500">
                        <strong class="text-7xl">{{ users }}</strong> usuários cadastrados no sistema.
                    </div>
                </div>

            </div>
            <div class="p-6 bg-green-200 bg-opacity-25 ">

                <div class="ml-12">
                    <div class="mt-2 text-5xl text-gray-500">
                        <strong class="text-7xl">{{ books }}</strong> livros cadastrados no sistema.
                    </div>
                </div>

            </div>
            <div class="p-6 bg-yellow-200 bg-opacity-25 ">

                <div class="ml-12">
                    <div class="mt-2 text-5xl text-gray-500">
                        <strong class="text-7xl">{{ bookshelves }}</strong> prateleiras cadastrados no sistema.
                    </div>
                </div>

            </div>
            <div class="p-6 bg-red-200 bg-opacity-25 ">

                <div class="ml-12">
                    <div class="mt-2 text-5xl text-gray-500">
                        <strong class="text-7xl">{{ genres }}</strong> gêneros cadastrados no sistema.
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
        },
        props: {
            users: Object,
            books: Object,
            genres: Object,
            bookshelves: Object,
        },
    })
</script>