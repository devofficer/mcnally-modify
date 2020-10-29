<!doctype html>
<html lang="en">

<head id="head">
    <meta charset="utf-8">
    <title>Mcnally Finance India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets_front/img/favicon.ico" type="image/x-icon">
    <meta name="description" content="A robust suite of app and landing page templates by Medium Rare">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500" rel="stylesheet">
    <link href="/assets_front/css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets_front/css/entypo.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets_front/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://s3.amazonaws.com/icomoon.io/114779/Socicon/style.css?u8vidh">
    <link rel="stylesheet" href="https://js.stripe.com/v3/fingerprinted/css/checkout-4a3ea81c6e2476a3f315d001c2d6bf70.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">


  </head>
  <body>

    <div class="navbar-container">
    </div>
    <div class="main-container">
      <section class="fullwidth-split">
        <div class="container-fluid">
          <div class="row no-gutters height-100 justify-content-center">
            <div class="col-12 col-lg-6 fullwidth-split-image bg-dark d-flex justify-content-center align-items-center">
              <img alt="Image" src="/assets_front/img/LoginLight.jpg" class="bg-image position-absolute opacity-30" />
              <div class="col-12 col-sm-8 col-lg-9 text-center pt-5 pb-5">
                <img alt="Image" src="/assets_front/img/McnallyLogoWhite.png" width="153" height="45" class="mb-4 logo-lg" />
                <span class="h3 mb-5">A robust suite of components developed for private investors</span>

                <div class="card text-left">
                  <div class="card-body">
                    <div class="media">
                      <img alt="Image" src="/assets_front/img/check2.png" class="avatar" />
                      <div class="media-body">
                        <p class="mb-1">
                          “We are convinced that having exclusive financial information and accurate analysis is the key to achieving a successful investment portfolio.”
                        </p>
                        <small>Patricio Nally <br/>CEO & Financial Analyst</small>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!--end of col-->
            </div>
            <!--end of col-->
            <div class="col-12 col-sm-8 col-lg-6 fullwidth-split-text">
              <div class="col-12 col-lg-8 align-self-center">
              <div class="text-center mb-5" style="

    margin-bottom: 37px !important;

">
                  <h1 class="h2 mb-2">Make a Payment</h1>
                  <span>Please select a Membership Plan:</span>
                  <div>
                    <br>
                    @foreach($plans as $plan)
                    <button id="plan{{$plan->name}}" onclick="plan{{$plan->name}}()" class="btn btn-outline-secondary mb-1 active" >{{$plan->name}} ${{ Str::currency($plan->cost) }}</button>
                    @endforeach
                </div>
                </div>



<form id="payment-form" method="POST" action="">
  @csrf
  <div class="App-Global-Fields App-Global-Fields flex-container spacing-16 direction-row wrap-wrap">
    <div class="flex-item width-12">
      <div class="FormFieldGroup">
        <div class="FormFieldGroup-labelContainer FormFieldGroup-labelContainer flex-container justify-content-space-between">
          <label for="email">
            <span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">
              <span>Email Address</span>
            </span>
          </label>
        </div>

        <fieldset class="FormFieldGroup-Fieldset" id="email-fieldset">
          <div class="FormFieldGroup-container">
            <div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom">
              <div class="FormFieldInput">
                <span class="InputContainer" data-max="">
                  <input class="CheckoutInput Input Input--empty" autocomplete="email" autocorrect="off" spellcheck="false" id="email" name="email" type="email" aria-invalid="false" value="{{$email}}" required="" readonly="">
                </span>
              </div>
            </div>

            <div style="opacity: 0; height: 0px;">
              <span class="FieldError Text Text-color--red Text-fontSize--13">
                <span></span>
              </span>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>

  <div class="flex-container spacing-16 direction-row wrap-wrap">
    <div class="flex-item width-12">
      <div class="FormFieldGroup">
        <div class="FormFieldGroup-labelContainer FormFieldGroup-labelContainer flex-container justify-content-space-between">
          <label for="cardNumber-fieldset">
            <span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">
              <span>Card Information</span>
            </span>
          </label>
        </div>

        <fieldset class="FormFieldGroup-Fieldset" id="cardNumber-fieldset">
          <div class="FormFieldGroup-container">
            <div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop">
              <div class="FormFieldInput">
                <span class="InputContainer" data-max="">
                  <input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty" autocomplete="cc-number" autocorrect="off" spellcheck="false" id="cardNumber" name="cardNumber" inputmode="numeric" aria-label="Número de tarjeta" placeholder="1234 1234 1234 1234" aria-invalid="false" value="" required="" maxlength="19">
                </span>
                <div class="FormFieldInput-Icons" style="opacity: 1;">
                  <div style="transform: none;">
                    <span class="FormFieldInput-IconsIcon is-visible">
                      <img src="https://js.stripe.com/v3/fingerprinted/img/visa-365725566f9578a9589553aa9296d178.svg" alt="visa" class="BrandIcon">
                    </span>
                  </div>
                  <div style="transform: none;">
                    <span class="FormFieldInput-IconsIcon is-visible">
                      <img src="https://js.stripe.com/v3/fingerprinted/img/mastercard-4d8844094130711885b5e41b28c9848f.svg" alt="mastercard" class="BrandIcon">
                    </span>
                  </div>
                  <div style="transform: none;">
                    <span class="FormFieldInput-IconsIcon is-visible">
                      <img src="https://js.stripe.com/v3/fingerprinted/img/amex-a49b82f46c5cd6a96a6e418a6ca1717c.svg" alt="amex" class="BrandIcon">
                    </span>
                  </div>
                  <div class="CardFormFieldGroupIconOverflow">
                    <span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible" role="presentation">
                      <span class="FormFieldInput-IconsIcon" role="presentation">
                        <img src="https://js.stripe.com/v3/fingerprinted/img/unionpay-8a10aefc7295216c338ba4e1224627a1.svg" alt="unionpay" class="BrandIcon">
                      </span>
                    </span>
                    <span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible" role="presentation">
                      <span class="FormFieldInput-IconsIcon" role="presentation">
                        <img src="https://js.stripe.com/v3/fingerprinted/img/jcb-271fd06e6e7a2c52692ffa91a95fb64f.svg" alt="jcb" class="BrandIcon">
                      </span>
                    </span>
                    <span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible" role="presentation">
                      <span class="FormFieldInput-IconsIcon" role="presentation">
                        <img src="https://js.stripe.com/v3/fingerprinted/img/discover-ac52cd46f89fa40a29a0bfb954e33173.svg" alt="discover" class="BrandIcon">
                      </span>
                    </span>
                    <span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--visible" role="presentation">
                      <span class="FormFieldInput-IconsIcon" role="presentation">
                        <img src="https://js.stripe.com/v3/fingerprinted/img/diners-fbcbd3360f8e3f629cdaa80e93abdb8b.svg" alt="diners" class="BrandIcon">
                      </span>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="FormFieldGroup-child FormFieldGroup-child--width-6 FormFieldGroup-childLeft FormFieldGroup-childBottom">
              <div class="FormFieldInput">
                <span class="InputContainer" data-max="">
                  <input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty" id="cardExpiry" name="cardExpiry" data-mask='mm/yy' placeholder="MM/AA" required="" maxlength="5">
                </span>
              </div>
            </div>

            <div class="FormFieldGroup-child FormFieldGroup-child--width-6 FormFieldGroup-childRight FormFieldGroup-childBottom">
              <div class="FormFieldInput has-icon">
                <span class="InputContainer" data-max="">
                  <input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty" autocomplete="cc-csc" autocorrect="off" spellcheck="false" id="cardCvc" name="cardCvc" inputmode="numeric" aria-label="Código de seguridad" placeholder="CVC" aria-invalid="false" value="" required="" maxlength="3">
                </span>
                <div class="FormFieldInput-Icon is-loaded">
                  <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 21" class="Icon Icon--md">
                    <g fill="none" fill-rule="evenodd">
                      <g id="cvc" class="Icon-fill">
                        <g id="card" transform="translate(0 2)">
                          <path id="shape" d="M21.68 0H2c-.92 0-2 1.06-2 2v15c0 .94 1.08 2 2 2h25c.92 0 2-1.06 2-2V9.47a5.98 5.98 0 0 1-3 1.45V11c0 .66-.36 1-1 1H3c-.64 0-1-.34-1-1v-1c0-.66.36-1 1-1h17.53a5.98 5.98 0 0 1 1.15-9z" opacity=".2">
                          </path>
                          <path id="shape" d="M19.34 3H0v3h19.08a6.04 6.04 0 0 1 .26-3z" opacity=".3">
                          </path>
                        </g>
                        <g id="shape" transform="translate(18)">
                          <path d="M7 14A7 7 0 1 1 7 0a7 7 0 0 1 0 14zM4.22 4.1h-.79l-1.93.98v1l1.53-.8V9.9h1.2V4.1zm2.3.8c.57 0 .97.32.97.78 0 .5-.47.85-1.15.85h-.3v.85h.36c.72 0 1.21.36 1.21.88 0 .5-.48.84-1.16.84-.5 0-1-.16-1.52-.47v1c.56.24 1.12.37 1.67.37 1.31 0 2.21-.67 2.21-1.64 0-.68-.42-1.23-1.12-1.45.6-.2.99-.73.99-1.33C8.68 4.64 7.85 4 6.65 4a4 4 0 0 0-1.57.34v.98c.48-.27.97-.42 1.44-.42zm4.32 2.18c.73 0 1.24.43 1.24.99 0 .59-.51 1-1.24 1-.44 0-.9-.14-1.37-.43v1.03c.49.22.99.33 1.48.33.26 0 .5-.04.73-.1.52-.85.82-1.83.82-2.88l-.02-.42a2.3 2.3 0 0 0-1.23-.32c-.18 0-.37.01-.57.04v-1.3h1.44a5.62 5.62 0 0 0-.46-.92H9.64v3.15c.4-.1.8-.17 1.2-.17z">
                          </path>
                        </g>
                      </g>
                    </g>
                  </svg>
                </div>
              </div>
            </div>

            <div style="opacity: 0; height: 0px;">
              <span class="FieldError Text Text-color--red Text-fontSize--13">
                <span></span>
              </span>
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <div class="billing-container billing-container flex-item width-12">
      <div style="height: 100%; opacity: 1; pointer-events: auto;">
        <div class="flex-container spacing-16 direction-row wrap-wrap">
          <div class="flex-item width-12">
            <div class="FormFieldGroup">
              <div class="FormFieldGroup-labelContainer FormFieldGroup-labelContainer flex-container justify-content-space-between">
                <label for="billingName">
                  <span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">
                    <span>Card Name</span>
                  </span>
                </label>
              </div>

              <fieldset class="FormFieldGroup-Fieldset" id="billingName-fieldset">
                <div class="FormFieldGroup-container">
                  <div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom">
                    <div class="FormFieldInput">
                      <span class="InputContainer" data-max="">
                        <input class="CheckoutInput Input Input--empty" autocomplete="ccname" autocorrect="off" spellcheck="false" id="billingName" name="billingName" type="text" aria-invalid="false" value="" required="" maxlength="30">
                      </span>
                    </div>
                  </div>
                  <div style="opacity: 0; height: 0px;">
                    <span class="FieldError Text Text-color--red Text-fontSize--13">
                      <span></span>
                    </span>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>

          <div class="flex-item width-12">
            <div class="FormFieldGroup">
              <div class="FormFieldGroup-labelContainer FormFieldGroup-labelContainer flex-container justify-content-space-between">
                <label for="country">
                  <span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">
                    <span>Your Country</span>
                  </span>
                </label>
              </div>
              <fieldset class="FormFieldGroup-Fieldset" id="country-fieldset">
                <div class="FormFieldGroup-container FormFieldGroup-container--supportTransitions">
                  <div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom" _pose="enter,flip">
                    <div class="FormFieldInput is-select">
                      <div>
                        <div class="Select">
                          <select id="billingCountry" name="billingCountry" autocomplete="billing country" class="Select-source" aria-label="País o región" required="">
                            <option value="" disabled="" hidden=""></option>
                            <option value="Afganistán">Afganistán</option>
                            <option value="Albania">Albania</option>
                            <option value="Alemania">Alemania</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguila">Anguila</option>
                            <option value="Antártida">Antártida</option>
                            <option value="Antigua y Barbuda">Antigua y Barbuda</option>
                            <option value="Arabia Saudí">Arabia Saudí</option>
                            <option value="Argelia">Argelia</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaiyán">Azerbaiyán</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bangladés">Bangladés</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Baréin">Baréin</option>
                            <option value="Bélgica">Bélgica</option>
                            <option value="Belice">Belice</option>
                            <option value="Benín">Benín</option>
                            <option value="Bermudas">Bermudas</option>
                            <option value="Bielorrusia">Bielorrusia</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
                            <option value="Botsuana">Botsuana</option>
                            <option value="Brasil">Brasil</option>
                            <option value="Brunéi">Brunéi</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Bután">Bután</option>
                            <option value="Cabo Verde">Cabo Verde</option>
                            <option value="Camboya">Camboya</option>
                            <option value="Camerún">Camerún</option>
                            <option value="Canadá">Canadá</option>
                            <option value="Caribe neerlandés">Caribe neerlandés</option>
                            <option value="Catar">Catar</option>
                            <option value="Chad">Chad</option>
                            <option value="Chequia">Chequia</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Chipre">Chipre</option>
                            <option value="Ciudad del Vaticano">Ciudad del Vaticano</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoras">Comoras</option>
                            <option value="Congo">Congo</option>
                            <option value="Corea del Sur">Corea del Sur</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                            <option value="Croacia">Croacia</option>
                            <option value="Curazao">Curazao</option>
                            <option value="Dinamarca">Dinamarca</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egipto">Egipto</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Eslovaquia">Eslovaquia</option>
                            <option value="Eslovenia">Eslovenia</option>
                            <option value="España">España</option>
                            <option value="Estados Unidos">Estados Unidos</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Esuatini">Esuatini</option>
                            <option value="Etiopía">Etiopía</option>
                            <option value="Filipinas">Filipinas</option>
                            <option value="Finlandia">Finlandia</option>
                            <option value="Fiyi">Fiyi</option>
                            <option value="Francia">Francia</option>
                            <option value="Gabón">Gabón</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Granada">Granada</option>
                            <option value="Grecia">Grecia</option>
                            <option value="Groenlandia">Groenlandia</option>
                            <option value="Guadalupe">Guadalupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guayana Francesa">Guayana Francesa</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
                            <option value="Guinea-Bisáu">Guinea-Bisáu</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haití">Haití</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hungría">Hungría</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Irak">Irak</option>
                            <option value="Irán">Irán</option>
                            <option value="Irlanda">Irlanda</option>
                            <option value="Isla Bouvet">Isla Bouvet</option>
                            <option value="Isla de la Ascensión">Isla de la Ascensión</option>
                            <option value="Isla de Man">Isla de Man</option>
                            <option value="Islandia">Islandia</option>
                            <option value="Islas Åland">Islas Åland</option>
                            <option value="Islas Caimán">Islas Caimán</option>
                            <option value="Islas Cook">Islas Cook</option>
                            <option value="Islas Feroe">Islas Feroe</option>
                            <option value="Islas Georgia del Sur">Islas Georgia del Sur</option>
                            <option value="Islas Malvinas">Islas Malvinas</option>
                            <option value="Islas Pitcairn">Islas Pitcairn</option>
                            <option value="Islas Salomón">Islas Salomón</option>
                            <option value="Islas Turcas y Caicos">Islas Turcas y Caicos</option>
                            <option value="Islas Vírgenes Británicas">Islas Vírgenes Británicas</option>
                            <option value="Israel">Israel</option>
                            <option value="Italia">Italia</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japón">Japón</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordania">Jordania</option>
                            <option value="Kazajistán">Kazajistán</option>
                            <option value="Kenia">Kenia</option>
                            <option value="Kirguistán">Kirguistán</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Laos">Laos</option>
                            <option value="Lesoto">Lesoto</option>
                            <option value="Letonia">Letonia</option>
                            <option value="Líbano">Líbano</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libia">Libia</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lituania">Lituania</option>
                            <option value="Luxemburgo">Luxemburgo</option>
                            <option value="Macedonia del Norte">Macedonia del Norte</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malasia">Malasia</option>
                            <option value="Malaui">Malaui</option>
                            <option value="Maldivas">Maldivas</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marruecos">Marruecos</option>
                            <option value="Martinica">Martinica</option>
                            <option value="Mauricio">Mauricio</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="México">México</option>
                            <option value="Moldavia">Moldavia</option>
                            <option value="Mónaco">Mónaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar (Birmania)</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Níger">Níger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Noruega">Noruega</option>
                            <option value="Nueva Caledonia">Nueva Caledonia</option>
                            <option value="Nueva Zelanda">Nueva Zelanda</option>
                            <option value="Omán">Omán</option>
                            <option value="Países Bajos">Países Bajos</option>
                            <option value="Pakistán">Pakistán</option>
                            <option value="Panamá">Panamá</option>
                            <option value="Papúa Nueva Guinea">Papúa Nueva Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Perú">Perú</option>
                            <option value="Polinesia Francesa">Polinesia Francesa</option>
                            <option value="Polonia">Polonia</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="RAE de Hong Kong (China)">RAE de Hong Kong (China)</option>
                            <option value="RAE de Macao (China)">RAE de Macao (China)</option>
                            <option value="Reino Unido">Reino Unido</option>
                            <option value="República Centroafricana">República Centroafricana</option>
                            <option value="República Democrática del Congo">República Democrática del Congo</option>
                            <option value="República Dominicana">República Dominicana</option>
                            <option value="Reunión">Reunión</option>
                            <option value="Ruanda">Ruanda</option>
                            <option value="Rumanía">Rumanía</option>
                            <option value="Rusia">Rusia</option>
                            <option value="Sáhara Occidental">Sáhara Occidental</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Bartolomé">San Bartolomé</option>
                            <option value="San Cristóbal y Nieves">San Cristóbal y Nieves</option>
                            <option value="San Marino">San Marino</option>
                            <option value="San Martín">San Martín</option>
                            <option value="San Pedro y Miquelón">San Pedro y Miquelón</option>
                            <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
                            <option value="Santa Elena">Santa Elena</option>
                            <option value="Santa Lucía">Santa Lucía</option>
                            <option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leona">Sierra Leona</option>
                            <option value="Singapur">Singapur</option>
                            <option value="Sint Maarten">Sint Maarten</option>
                            <option value="Somalia">Somalia</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudáfrica">Sudáfrica</option>
                            <option value="Sudán del Sur">Sudán del Sur</option>
                            <option value="Suecia">Suecia</option>
                            <option value="Suiza">Suiza</option>
                            <option value="Surinam">Surinam</option>
                            <option value="Svalbard y Jan Mayen">Svalbard y Jan Mayen</option>
                            <option value="Tailandia">Tailandia</option>
                            <option value="Taiwán">Taiwán</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Tayikistán">Tayikistán</option>
                            <option value="Territorio Británico del Océano Índico">Territorio Británico del Océano Índico</option>
                            <option value="Territorios Australes Franceses">Territorios Australes Franceses</option>
                            <option value="Territorios Palestinos">Territorios Palestinos</option>
                            <option value="Timor-Leste">Timor-Leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                            <option value="Tristán de Acuña">Tristán de Acuña</option>
                            <option value="Túnez">Túnez</option>
                            <option value="Turkmenistán">Turkmenistán</option>
                            <option value="Turquía">Turquía</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Ucrania">Ucrania</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistán">Uzbekistán</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Wallis y Futuna">Wallis y Futuna</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Yibuti">Yibuti</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabue">Zimbabue</option>
                          </select>
                          <svg class="InlineSVG Icon Select-arrow Icon--sm" focusable="false" width="12" height="12">
                            <path d="M10.193 3.97a.75.75 0 0 1 1.062 1.062L6.53 9.756a.75.75 0 0 1-1.06 0L.745 5.032A.75.75 0 0 1 1.807 3.97L6 8.163l4.193-4.193z" fill-rule="evenodd">
                            </path>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div style="opacity: 0; height: 0px;">
                    <span class="FieldError Text Text-color--red Text-fontSize--13">
                      <span></span>
                    </span>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="flex-item width-12"></div>
    <div class="flex-item width-12">
      <button class="SubmitButton SubmitButton--incomplete" type="submit" style="background-color: rgb(61, 66, 78); color: rgb(255, 255, 255);" id="buttonSubmit">
        <div class="SubmitButton-Shimmer" style="background: linear-gradient(to right, rgba(61, 66, 78, 0) 0%, rgb(82, 87, 100) 50%, rgba(61, 66, 78, 0) 100%);">
        </div>
        <div class="SubmitButton-TextContainer">
          <span class="SubmitButton-Text SubmitButton-Text--current Text Text-color--default Text-fontWeight--500 Text--truncate">
            <span>
              Pay <span id="planPrice"></span> US$
            </span>
          </span>
          <span class="SubmitButton-Text SubmitButton-Text--pre Text Text-color--default Text-fontWeight--500 Text--truncate">
            <span>Procesando...</span>
          </span>
        </div>
        <div class="SubmitButton-IconContainer">
          <div class="SubmitButton-Icon SubmitButton-Icon--pre">
            <div class="Icon Icon--md Icon--square">
              <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" focusable="false">
                <path d="M3 7V5a5 5 0 1 1 10 0v2h.5a1 1 0 0 1 1 1v6a2 2 0 0 1-2 2h-9a2 2 0 0 1-2-2V8a1 1 0 0 1 1-1zm5 2.5a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0v-2a1 1 0 0 0-1-1zM11 7V5a3 3 0 1 0-6 0v2z" fill="#ffffff" fill-rule="evenodd">
                </path>
              </svg>
            </div>
          </div>
          <div class="SubmitButton-Icon SubmitButton-SpinnerIcon SubmitButton-Icon--pre">
            <div class="Icon Icon--md Icon--square">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false">
                <ellipse cx="12" cy="12" rx="10" ry="10" style="stroke: rgb(255, 255, 255);"></ellipse>
              </svg>
            </div>
          </div>
        </div>

        <div class="SubmitButton-CheckmarkIcon">
          <div class="Icon Icon--md">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="14" focusable="false">
              <path d="M 0.5 6 L 8 13.5 L 21.5 0" fill="transparent" stroke-width="2" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round">
              </path>
            </svg>
          </div>
        </div>
      </button>
    </div>
  </div>
</form>

<span style="color: #909090;">
  Powered by <a href="https://stripe.com" style="color: #d4d4d4;font-weight: bold;"><img alt="Image" class="logo" src="/assets_front/img/logo-stripe.png" style="width: 48px;height: 19px;"></a>
</span>


              </div>
              <!--end of col-->
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
      <!--end of section-->
    </div>

    <form action="{{ route('login') }}" method="POST" id="login" style="display: none;">
      @csrf
      <input type="text" name="email" value="{{ $email }}">
      <input type="text" name="password" value="{{ session('pass') }}">
    </form>
    <button id="sa-success" style="display: none;"></button>
    <button id="sa-params" style="display: none;"></button>
    <button id="sa-params-2" style="display: none;"></button>

    <!-- Required vendor scripts (Do not remove) -->
    <script type="text/javascript" src="/assets_front/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets_front/js/popper.min.js"></script>
    <script type="text/javascript" src="/assets_front/js/bootstrap.js"></script>

    <!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->

    <!-- AOS (Animate On Scroll - animates elements into view while scrolling down) -->
    <script type="text/javascript" src="/assets_front/js/aos.js"></script>
    <!-- Flatpickr (calendar/date/time picker UI) -->
    <script type="text/javascript" src="/assets_front/js/flatpickr.min.js"></script>
    <!-- Flickity (handles touch enabled carousels and sliders) -->
    <script type="text/javascript" src="/assets_front/js/flickity.pkgd.min.js"></script>
    <!-- jarallax (parallax effect and video backgrounds) -->
    <script type="text/javascript" src="/assets_front/js/jarallax.min.js"></script>
    <script type="text/javascript" src="/assets_front/js/jarallax-video.min.js"></script>
    <script type="text/javascript" src="/assets_front/js/jarallax-element.min.js"></script>
    <!-- ScrollMonitor (manages events for elements scrolling in and out of view) -->
    <script type="text/javascript" src="/assets_front/js/scrollMonitor.js"></script>
    <!-- jQuery smartWizard facilitates steppable wizard content -->
    <script type="text/javascript" src="/assets_front/js/jquery.smartWizard.min.js"></script>
    <!-- Smooth scroll (animation to links in-page)-->
    <script type="text/javascript" src="/assets_front/js/smooth-scroll.polyfills.min.js"></script>
    <!-- Prism (displays formatted code boxes) -->
    <script type="text/javascript" src="/assets_front/js/prism.js"></script>
    <script type="text/javascript" src="/assets_front/js/zoom.min.js"></script>

    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="/assets_front/js/theme.js"></script>

    <!-- form mask -->
    <script src="{{ URL::asset('assets/libs/inputmask/inputmask.min.js')}}"></script>
    <!-- form mask init -->
    <script src="{{ URL::asset('assets/js/pages/form-mask.init.js')}}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Sweet alert init js -->
    <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script> 

    <script type="text/javascript">
      var plan = 1;
      var form = document.getElementById('payment-form');
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        document.getElementById('buttonSubmit').disabled = true;
        document.getElementById('buttonSubmit').style = 'background-color: #34c38f;border-color: #34c38f;box-shadow:none;';
        checkout()
      });

      function checkout() {
        var _token = document.getElementsByName('_token')[0].value;
        var cardNumber = document.getElementById('cardNumber').value;
        var cardExpiry = document.getElementById('cardExpiry').value;
        var cardCvc = document.getElementById('cardCvc').value;
        var billingName = document.getElementById('billingName').value;
        var billingCountry = document.getElementById('billingCountry').value;
        
        const data = new FormData();
        
        data.append('_token', _token);
        data.append('cardNumber',  cardNumber);
        data.append('cardExpiry',  cardExpiry);
        data.append('cardCvc',     cardCvc);
        data.append('billingName', billingName);
        data.append('billingCountry', billingCountry);
        

        fetch('{{route('token')}}', {
           method: 'POST',
           body: data
        })
        .then(function(response) {
           if(response.ok) {
               return response.json();
           } else {
              $('#sa-params').click();
              document.getElementById('buttonSubmit').disabled = false;
              document.getElementById('buttonSubmit').style = 'background-color: rgb(61, 66, 78); color: rgb(255, 255, 255);';
           }

        })
        .then(function(response) {
          stripeTokenHandler(response.id, response.card.brand);
        })
        .catch(function(err) {
           $('#sa-params').click();
           document.getElementById('buttonSubmit').disabled = false;
           document.getElementById('buttonSubmit').style = 'background-color: rgb(61, 66, 78); color: rgb(255, 255, 255);';
        });
      }

      function stripeTokenHandler(token, branch) {
        var _token = document.getElementsByName('_token')[0].value;
        var cardNumber = document.getElementById('cardNumber').value;
        var cardExpiry = document.getElementById('cardExpiry').value;
        var cardCvc = document.getElementById('cardCvc').value;
        var billingName = document.getElementById('billingName').value;
        var billingCountry = document.getElementById('billingCountry').value;
        
        const data = new FormData();
      
        
        data.append('_token', _token);
        data.append('firstname', '{{$firstname}}');
        data.append('lastname',  '{{$lastname}}');
        data.append('email',     '{{$email}}');
        
        data.append('stripeToken',  token);

        data.append('cardNumber',  cardNumber);
        data.append('cardExpiry',  cardExpiry);
        data.append('cardCvc',     cardCvc);
        data.append('billingName', billingName);
        data.append('billingCountry', billingCountry);
        data.append('branch', branch);

        data.append('plan',      plan);

        fetch('{{route('register_step2')}}', {
           method: 'POST',
           body: data
        })
        .then(function(response) {
           if(response.ok) {
              $('#sa-success').click();
              var formLogin = document.getElementById('login');
              formLogin.submit();
           } else {
               $('#sa-params-2').click();
               document.getElementById('buttonSubmit').disabled = false;
               document.getElementById('buttonSubmit').style = 'background-color: rgb(61, 66, 78); color: rgb(255, 255, 255);';
           }

        })
        .catch(function(err) {
           $('#sa-params-2').click();
           document.getElementById('buttonSubmit').disabled = false;
           document.getElementById('buttonSubmit').style = 'background-color: rgb(61, 66, 78); color: rgb(255, 255, 255);';
        });

        // Submit the form
        // form.submit();
      }

      $(document).ready(function(){
        $('#plan{{$plans[0]->name}}').click(); 

        $('#cardNumber').inputmask({
          mask: '9999 9999 9999 9999',
          placeholder: '',
          showMaskOnHover: false,
          showMaskOnFocus: false,
          onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;

            //do something with it

            return processedValue;
          }
        });


        /*$('#cardExpiry').inputmask({
          mask: '99 / 99',
          placeholder: '',
          showMaskOnHover: false,
          showMaskOnFocus: false,
          onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;

            //do something with it

            return processedValue;
          }
        });*/

        $('#cardCvc').inputmask({
          mask: '999',
          placeholder: '',
          showMaskOnHover: false,
          showMaskOnFocus: false,
          onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;

            //do something with it

            return processedValue;
          }
        });
      });

      @foreach($plans as $plan)

      function plan{{$plan->name}}() {
        plan = {{$plan->id}};
        document.getElementById('plan{{$plan->name}}').style = 'background-color: #34c38f;border-color: #34c38f;box-shadow: none;';

        @foreach($plans as $pla)
        @if($pla->id != $plan->id)
          document.getElementById('plan{{$pla->name}}').style = '';
        @endif
        @endforeach

        document.getElementById('planPrice').innerHTML = '{{ Str::currency($plan->cost) }}';

      }

      @endforeach
    </script>
    <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>

    <script type="text/javascript">
        const API_FINNHUB = "{{ env('API_FINNHUB') }}";
    </script>
  </body>

</html>