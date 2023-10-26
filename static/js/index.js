const {
    createApp,
    ref
} = Vue

const getQouteForm = createApp({
    setup() {
        const form = ref({
            name: "",
            email: "",
            project_title: "",
            project_type: "",
            project_description: "",
        });

        const errors = ref({});
        const success = ref(false);

        const submitForm = () => {
       
            errors.value = {};
            const formData = new FormData();
        
            formData.append('name', form.value.name);
            formData.append('email', form.value.email);
            formData.append('project_title', form.value.project_title);
            formData.append('project_type', form.value.project_type);
            formData.append('project_description', form.value.project_description);

          
            axios
                .post('index/intent/sendqoute', formData)
                .then(response => {
                    errors.value = response.data.errors;
                    success.value = response.data.success;
                  //  console.log(response);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        };

        return {
            form,
            errors,
            success,
            submitForm,
        }
    },
}).mount('#getQouteModal');