<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1>Contact Me</h1>
                <form @submit.prevent="createContact">
                    <div class="form-group">
                        <label>Name</label>
                        <input
                            v-model="contact.name"
                            type="text"
                            name="name"
                            class="form-control"
                        />
                        <div v-if="errors && errors.name" class="text-danger">
                            {{ errors.name[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input
                            v-model="contact.email"
                            type="text"
                            name="email"
                            class="form-control"
                        />
                        <div v-if="errors && errors.email" class="text-danger">
                            {{ errors.email[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input
                            v-model="contact.phone"
                            type="text"
                            name="phone"
                            class="form-control"
                        />
                        <div v-if="errors && errors.phone" class="text-danger">
                            {{ errors.phone[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input
                            v-model="contact.subject"
                            type="text"
                            name="subject"
                            class="form-control"
                        />
                        <div
                            v-if="errors && errors.subject"
                            class="text-danger"
                        >
                            {{ errors.subject[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea
                            v-model="contact.message"
                            type="text"
                            name="message"
                            class="form-control"
                        ></textarea>
                        <div
                            v-if="errors && errors.message"
                            class="text-danger"
                        >
                            {{ errors.message[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Send</button>
                    </div>
                    <div v-if="success" class="alert alert-success mt-3">
                        Message sent!
                    </div>
                </form>
            </div>
            <div row>
                <div class=""></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3196.0702623550023!2d3.055579742532456!3d36.76888185527434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDQ2JzA5LjUiTiAzwrAwMycyMS45IkU!5e0!3m2!1sen!2sus!4v1595686117312!5m2!1sen!2sus"
                        width="400"
                        height="300"
                        frameborder="0"
                        style="border:0;"
                        allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0"
                    ></iframe>
                </div>
            </div>
            <footer id="footer">
                <div class="container text-center ">
                    <div class="copyright text-center">
                        &copy; 2020 <strong>Ilyas Bendaas</strong> all rights
                        reserved
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            contact: this.getBasicForm(),
            errors: {},
            success: false,
            loaded: true
        };
    },
    methods: {
        getBasicForm() {
            return {
                name: "",
                email: "",
                phone: "",
                subject: "",
                message: ""
            };
        },
        createContact: function() {
            if (this.loaded) {
                this.loaded = false;
                this.success = false;
                this.errors = {};
                let contact = this.contact;
                let uri = "http://portfolio.test/api/contact";
                this.axios
                    .post(uri, this.contact)
                    .then(response => {
                        this.$router.push({ name: "contact" });
                        this.contact = this.getBasicForm();
                        this.loaded = true;
                        this.success = true;
                    })
                    .catch(error => {
                        this.loaded = true;
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
            }
        }
    }
};
</script>
