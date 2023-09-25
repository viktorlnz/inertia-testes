<script setup>
import { Head, Link } from '@inertiajs/vue3';

import { onMounted, ref } from 'vue';

const props = defineProps({
    event: {
        type: Object,
    }
});

const event = ref({
    'id': 0,
    'name': '',
    'description': '',
    'shortDescription': '',
    'startsAtDate': '',
    'startsAtTime': '',
    'durationTime': '',
    'endsAtDate': '',
    'endsAtTime': '',
    'image': {
        'path': ''
    },
    'address': {
        'address': '',
        'neighborhood': '',
        'city': '',
        'uf': '',
        'number': 0,
        'zipCode': ''
    }
});

onMounted(() => {
    console.log(props);
    event.value = props.event.data;
});

</script>

<template>
    <Head>
        <title>{{ event.name }}</title>
    </Head>
    <header>
        <h1>Retroarch Eventos</h1>
    </header>
    <main class="container-fluid">
        <Link href="/" as="button" type="button" class="btn btn-primary mx-3">Retornar</Link>
        <div>
            <h2 class="text-center">{{ event.name }}</h2>
            <img :src="event.image.path" :alt="event.name" />

            <p class="text-center">{{ event.description }}</p>
        </div>
        <div class="d-flex justify-content-between">
            <span class="d-block">Começa as: {{ event.startsAtDate +' as '+ event.startsAtTime }}</span>
            <span class="d-block">Termina as: {{ event.endsAtDate + ' as ' + event.endsAtTime}}</span>
        </div>
        <div class="card m-5 p-3 bg-secondary text-white">
            <h4>Onde é</h4>
            <p>{{ event.address.address }}, Nº{{ event.address.number }}, {{ event.address.neighborhood }}
                , cidade de {{ event.address.city }}</p>
            <p class="text-end">CEP: {{ event.address.zipCode }}</p>
        </div>
    </main>
</template>