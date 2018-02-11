<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.2.3/css/bulma.css">
</head>

<body>

<div id="root" class="container">
    <modal v-if="showModal" @close="showModal = false"></modal>
    <button @click="showModal = true">Show Modal</button>
    
    <tabs>
        <tab name="About Us" :selected="true">
            <h1>Abot Us Tab</h1>
        </tab>
        <tab name="Our Vision" :selected="true">
            <h1>Vision tab</h1>
        </tab>
        <tab name="Our Culture" :selected="true">
            <h1>Vision tab</h1>
        </tab>
    </tabs>
</div>

<template id="modal-template">
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="box">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam consectetur cum delectus dignissimos et fugit perspiciatis possimus provident quibusdam quidem, quisquam quos sit tenetur vel? Commodi est expedita odio.</p>
            </div>
        </div>
        <button class="modal-close" v-on:click="$emit('close')"></button>
    </div>
</template>


<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.6/vue.js"></script>
<script>
    
    Vue.component('modal', {
        template: '#modal-template',
    });

    Vue.component('tabs', {
        template: '#modal-template',
    });

    Vue.component('tab', {
        template: '<div><slot></slot></div>',
        
        props: {
            name: {required: true},
            selected: {default: false}
        }
    });
    
    var app = new Vue({
        el: '#root',
        
        data() {
            return {
                showModal: false
            }
        }
    });
</script>
</body>
</html>