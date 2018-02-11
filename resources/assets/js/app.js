
class Errors {
    
    constructor() {
        this.errors = {}
    }
    
    has(field) {
        return this.errors.hasOwnProperty(field)
    }
    
    get(field) {
        if ( this.errors[field] ) {
            return this.errors[field][0];
        }
    }
    
    any() {
        return (Object.keys(this.errors).length > 0)
    }
    
    record(errors) {
        this.errors = errors;
    }
    
    clear(field) {
        
        if (field) {
            delete this.errors[field];
        } else {
            this.errors = {};
        }
    }
    
}

class Form {
    
    constructor(data) {
        
        this.originalData = data;
        
        for (let field in data) {
            this[field] = data[field];
        }
        
        this.errors = new Errors();
        
    }
    
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }
    
    data() {
        let data = Object.assign({}, this);
        
        delete data.originalData;
        delete data.errors;
        
        return data;
    }
    
    submit(requestType, url) {
        
        return new Promise((resolve, reject) => {
            
            axios[requestType](url, this.data())
                .then(({data}) => {
                    
                    this.onSuccess(data).bind(this);
                    resolve(data);
                    
                })
                .catch(error => {
                    this.onFail.bind(this);
                    
                    reject(error.response.data);
                });
            
        })
    }
    
    onSuccess(data) {
        alert(data.message);
        
        this.reset();
    }
    
    onFail({data}) {
        this.errors.record(data)
    }
    
}

const app = new Vue({
    el: '#app',
    
    
    data : {
        
        form: new Form({
            name: '',
            description: ''
        }),
        
        errors: new Errors()
    },
    
    methods: {
        onSubmit() {
            
            this.form.submit('post', '/projects')
                .then(data => console.log(data))
                .catch(errors => console.log(errors));
            
        },
        
        onSuccess(response) {
            alert(response.data.message);
            
            this.form.reset();
        }
    }
});
