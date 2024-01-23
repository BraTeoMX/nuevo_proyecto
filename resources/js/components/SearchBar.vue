<!-- resources/js/components/SearchBar.vue -->
<template>
    <div>
        <input v-model="searchQuery" type="text" placeholder="Buscar">
        <button class="btn btn-link" @click="performSearch">
            <img src="{{ asset('images/buscar.webp') }}" alt="Buscar" height="20" width="20">
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            searchQuery: '',
        };
    },
    methods: {
        performSearch() {
            // Aquí puedes realizar la acción de búsqueda con this.searchQuery
            console.log('Realizar búsqueda con:', this.searchQuery);
            // Puedes agregar más lógica para la búsqueda aquí
        },
    },
};
</script>
