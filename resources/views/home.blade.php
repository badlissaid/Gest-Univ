

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login et Signup</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body {
            background-color: linear-gradient(45deg, #6d0f6d, #cf7acf, #89368b, #8f2a76);;
            font-family: Arial, sans-serif;
            animation: backgroundGradient 2s infinite;

        }
        @keyframes backgroundGradient {
            0% { background: linear-gradient(45deg, #6d0f6d, #cf7acf, #89368b, #8f2a76); }
            50% { background: linear-gradient(45deg, #cf7acf, #6d0f6d, #8f2a76, #89368b); }
            100% { background: linear-gradient(45deg, #6d0f6d, #cf7acf, #89368b, #8f2a76); }
        }

        .welcome-message {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ffffff;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.9);
        }

        .form-control {
            margin-bottom: 15px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
        }

        .card {
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(7, 7, 7, 0.1);
        }

        .card-header {
            background-color: #800080;
            color: white;
        }

        .card-body {
            padding: 20px;
        }

        .btn-block {
            width: 100%;
            background-color: #800080;
            border-color: #800080;
        }

        .btn-block:hover {
            background-color: #600060;
            border-color: #600060;
        }
    </style>
</head>
<body>
<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <h2 class="welcome-message">Bienvenue dans la plateforme web EduCentre</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5 mb-3">
            <login-form></login-form>
        </div>
        <div class="col-md-5 mb-3">
            <signup-form></signup-form>
        </div>
    </div>
</div>

<script>
    Vue.component('login-form', {
        template: `
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Connexion</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="login">
                            <div class="form-group">
                                <label for="login-email">Email</label>
                                <input type="email" class="form-control" v-model="email" placeholder="Entrez votre email" required>
                            </div>
                            <div class="form-group">
                                <label for="login-password">Mot de passe</label>
                                <input type="password" class="form-control" v-model="password" placeholder="Entrez votre mot de passe" required>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                            <div class="mt-2" :class="messageClass">{{ message }}</div>
                        </form>
                    </div>
                </div>
            `,
        data() {
            return {
                email: '',
                password: '',
                role: '',
                message: '',
                messageClass: 'text-danger'
            };
        },
        methods: {
            login() {
                axios.post('/api/login', {
                    email: this.email,
                    password: this.password,

                })
                    .then(response => {
                        const result = response.data;
                        if (result === "admin") {
                            this.message = "Connexion réussie en tant qu'Admin!";
                            this.messageClass = 'text-success';
                            window.location.href = 'admin.html';
                        } else if (result === "teacher") {
                            this.message = "Connexion réussie en tant que Teacher!";
                            this.messageClass = 'text-success';
                            window.location.href = 'enseignant.html';
                        } else if (result === "student") {
                            this.message = "Connexion réussie en tant que Student!";
                            this.messageClass = 'text-success';
                            window.location.href = 'student.html';
                        } else {
                            this.message = "Email, mot de passe ou rôle incorrect.";
                            this.messageClass = 'text-danger';
                        }
                    })
                    .catch(error => {
                        this.message = "Erreur lors de la connexion.";
                        this.messageClass = 'text-danger';
                    });
            }
        }
    });

    Vue.component('signup-form', {
        template: `
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Inscription</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="signup">
                            <div class="form-group">
                                <label for="signup-email">Email</label>
                                <input type="email" class="form-control" v-model="email" placeholder="Entrez votre email" required>
                            </div>
                            <div class="form-group">
                                <label for="signup-password">Mot de passe</label>
                                <input type="password" class="form-control" v-model="password" placeholder="Entrez votre mot de passe" required>
                            </div>
                            <div class="form-group">
                                <label for="signup-name">Nom</label>
                                <input type="text" class="form-control" v-model="name" placeholder="Entrez votre nom" required>
                            </div>
                            <div class="form-group">
                                <label for="signup-prenom">Prénom</label>
                                <input type="text" class="form-control" v-model="prenom" placeholder="Entrez votre prénom" required>
                            </div>
                            <div class="form-group">
                                <label for="signup-role">Rôle</label>
                                <select class="form-control" v-model="role" required>
                                    <option value="">Sélectionnez votre rôle</option>
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                            <div class="mt-2" :class="messageClass">{{ message }}</div>
                        </form>
                    </div>
                </div>
            `,
        data() {
            return {
                email: '',
                password: '',
                name: '',
                prenom: '',
                role: '',
                message: '',
                messageClass: 'text-danger'
            };
        },
        methods: {
            signup() {
                axios.post('/api/signup', {
                    email: this.email,
                    password: this.password,
                    name: this.name,
                    prenom: this.prenom,
                    role: this.role
                })
                    .then(response => {
                        this.message = "Inscription réussie!";
                        this.messageClass = 'text-success';
                        // Redirect based on role
                        if (this.role === "admin") {
                            window.location.href = 'admin_dashboard.html';
                        } else if (this.role === "teacher") {
                            window.location.href = 'enseignant.html';
                        } else if (this.role === "student") {
                            window.location.href = 'student.html';
                        }
                    })
                    .catch(error => {
                        this.message = "Erreur lors de l'inscription.";
                        this.messageClass = 'text-danger';
                    });
            }
        }
    });

    new Vue({
        el: '#app',
    });
</script>
</body>
</html>
