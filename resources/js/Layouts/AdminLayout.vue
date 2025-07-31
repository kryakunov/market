<script>
import {Link} from "@inertiajs/vue3"
export default {
    name: "AdminLayout",

    components: {
        Link
    }
}
</script>

<template>
    <section class="w-full bg-gray-50 p-4 border-b border-gray-100">
        <header>
            Market admin
        </header>
    </section>
    <section class="flex">
        <aside class="w-1/4 min-h-screen bg-blue-950">
            <nav>
                <Link :href="route('dashboard')" class="block p-4 text-white border-b border-gray-500">Дашборд</Link>
                <Link :href="route('admin.product-parents.index')" class="block p-4 text-white border-b border-gray-500">Группа продуктов</Link>
                <Link :href="route('admin.products.index')" class="block p-4 text-white border-b border-gray-500">Продукты</Link>
                <Link :href="route('admin.categories.index')" class="block p-4 text-white border-b border-gray-500">Категории</Link>
                <Link :href="route('admin.params.index')" class="block p-4 text-white border-b border-gray-500">Характеристики</Link>
            </nav>
        </aside>
        <article class="w-3/4 bg-gray-50">
            <slot/>
        </article>
    </section>
    <section>
        <footer>

        </footer>
    </section>
</template>

<style scoped>

</style>
