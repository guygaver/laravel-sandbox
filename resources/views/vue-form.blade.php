
{{--The layout template allows us to reuse front end markup which is popular throughout our project--}}
{{--like html templates.--}}
{{---
you are able to specify the areas which will have content using the yield blade expression passing it a keyword
access this variable by using the section expression with the keyword passed to it
--}}
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">
</head>
<body>
<div class="container" id="app">
    
    @if(count($projects))
        <h1>My Projects</h1>
        @foreach($projects as $project)
            <p>{{ $project->name  }}</p>
        @endforeach
    @endif
    
    <form action="projects" method="post" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <div class="field">
            <label class="label">Project</label>
            <input class="input" type="text" value="bulma" v-model="form.name" name="name">
            <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
        </div>

        <div class="field">
            <label class="label">Description</label>
            <input class="input" type="text" value="hello@" v-model="form.description" name="description">
            <span class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
        </div>
        
        <button type="submit" :disabled="form.errors.any()" class="button is-primary">Submit</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.1/axios.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.3/vue.js"></script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>