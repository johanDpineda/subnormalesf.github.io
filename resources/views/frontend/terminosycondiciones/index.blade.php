@extends('frontend.layouts.app')
@section('title',__('Terms and Conditions'))

@section('content')

    <!-- Pantalla de carga -->
        @include('frontend.layouts.partials.bannermifutbol')
        @include('frontend.layouts.partials.sponsors')
        <div class="background-league">
            <div class="content">
                <div style="min-height:25vh;">
                    <div class="background-league" style="min-height:25vh;">
                        <div class="content h-100">
                            <div class="container-xl flex-grow-1 container-p-y ligaequiposd">

                                <section  style="font-size: 16px;color:white;font-family:'Rubik'">

                                    <p>
                                        <strong style="font-weight: bold; font-size: 18px;">
                                            TÉRMINOS Y CONDICIONES DE USO
                                        </strong>
                                    </p>

                                    <p>
                                        Bienvenido a MI.FUTBOL. Al acceder y utilizar https://mi.futbol/ (en adelante, el "Sitio Web"), usted acepta cumplir con los siguientes términos y condiciones. Lea detenidamente esta información antes de utilizar nuestros servicios.
                                    </p>

                                    <ol>

                                        <li>
                                            Aceptación de Términos y Condiciones
                                        </li>

                                        <p>
                                            Al acceder y utilizar el Sitio Web, usted acepta cumplir con estos Términos y Condiciones y cualquier modificación futura. Si no está de acuerdo con alguna parte de estos términos, le pedimos que no utilice nuestro Sitio Web.
                                        </p>


                                        <li>
                                            Uso del Sitio Web
                                            <ol>
                                                <li style="padding: 8px 0 8px;">
                                                    Uso Personal: El Sitio Web está destinado para uso personal y no comercial. No se permite el uso no autorizado del Sitio Web con fines comerciales o de cualquier otra índole sin el consentimiento expreso de MI.FUTBOL.
                                                </li>

                                                <li style="padding: 8px 0 8px;">
                                                    Registro de Usuario: Al registrarse en el Sitio Web, usted acepta proporcionar información precisa y completa. Es responsable de mantener la confidencialidad de su cuenta y contraseña y de todas las actividades que ocurran bajo su cuenta.
                                                </li>


                                            </ol>
                                        </li>

                                        <li>
                                            Información Personal y Privacidad
                                            <ol>
                                                <li style="padding: 8px 0 8px;">
                                                    Tratamiento de Datos Personales: El tratamiento de datos personales se rige por nuestra Política de Tratamiento de Datos Personales, la cual forma parte integral de estos Términos y Condiciones.
                                                </li>

                                                <li style="padding: 8px 0 8px;">
                                                    Privacidad de la Información: Reconocemos la importancia de la privacidad y nos esforzamos por proteger la información personal de nuestros usuarios. Consulte nuestra Política de Privacidad para obtener más detalles sobre cómo manejamos la información.
                                                </li>


                                            </ol>
                                        </li>

                                        <li>
                                            Contenido del Sitio Web
                                            <ol>
                                                <li style="padding: 8px 0 8px;">
                                                    Propiedad Intelectual: Todo el contenido del Sitio Web, incluyendo pero no limitado a textos, gráficos, logotipos, imágenes y software, está protegido por derechos de propiedad intelectual y es propiedad de MI.FUTBOL o sus licenciantes.
                                                </li>

                                                <li style="padding: 8px 0 8px;">
                                                    Uso Autorizado: Usted tiene permiso para acceder y utilizar el contenido del Sitio Web para su uso personal y no comercial. Cualquier otro uso sin el consentimiento previo por escrito de MI.FUTBOL está estrictamente prohibido.
                                                </li>


                                            </ol>
                                        </li>

                                        <li>
                                            Modificaciones y Actualizaciones
                                        </li>

                                        <p>
                                            MI.FUTBOL se reserva el derecho de modificar o actualizar estos Términos y Condiciones en cualquier momento. Las modificaciones entrarán en vigor inmediatamente después de su publicación en el Sitio Web. Es responsabilidad del usuario revisar periódicamente estos términos para estar al tanto de cualquier cambio.
                                        </p>













                                    </ol>
                                </section>



                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="back_to_top_container">
            <a class="gt3_back2top show" id="back_to_top">

            </a>
        </div>

        <script>
            // Función para desplazarse suavemente hacia arriba
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }

            // Mostrar u ocultar el botón basado en la posición de desplazamiento
            window.onscroll = function() {
                var btnContainer = document.querySelector(".back_to_top_container");
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    btnContainer.style.display = "block";
                } else {
                    btnContainer.style.display = "none";
                }
            };

            // Asociar la función scrollToTop al clic en el botón
            document.getElementById("back_to_top").addEventListener("click", scrollToTop);
        </script>
@endsection
