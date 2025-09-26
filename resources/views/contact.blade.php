<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Контакты - CEPHALON</title>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <style>
        @include('components.styles')
        
        /* Contact Page Styles */
        .contact-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 56px 64px;
            gap: 64px;
            min-height: 100vh;
        }

        .contact-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 0px;
            gap: 40px;
            width: 100%;
            max-width: 1312px;
        }

        .contact-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0px;
            gap: 128px;
            width: 100%;
        }

        .contact-title-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 0px;
            gap: 40px;
            width: 100%;
        }

        .contact-title {
            width: 100%;
            font-family: 'Arges', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            font-style: normal;
            font-weight: 1000;
            font-size: 120px;
            line-height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            letter-spacing: 0.64px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
        }

        .contact-description {
            width: 100%;
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            font-style: normal;
            font-weight: 400;
            font-size: 19.2px;
            line-height: 32px;
            letter-spacing: 0%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            margin: 0;
        }

        .contact-cards {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 0px;
            gap: 48px;
            width: 100%;
            flex-wrap: wrap;
        }

        .contact-card {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 24px 32px;
            gap: 24px;
            width: 374px;
            min-height: 276px;
            background: #100F11;
            backdrop-filter: blur(2px);
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }

        .contact-card-header {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 0px;
            gap: 8px;
        }

        .contact-card-name {
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            font-style: normal;
            font-weight: 600;
            font-size: 23.04px;
            line-height: 32px;
            display: flex;
            align-items: center;
            color: #FFFFFF;
            margin: 0;
        }

        .contact-card-role {
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 28px;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.6);
            margin: 0;
        }

        .contact-buttons {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 0px;
            gap: 16px;
            width: 100%;
            flex-wrap: wrap;
        }

        .contact-button {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 12px 24px;
            gap: 8px;
            height: 48px;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            flex: 1;
            min-width: 147px;
        }

        .contact-button.telegram {
            background: #1E4FCC;
        }

        .contact-button.telegram:hover {
            background: #1a42b3;
            transform: translateY(-2px);
        }

        .contact-button.email {
            background: rgba(255, 255, 255, 0.1);
        }

        .contact-button.email:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .contact-button-icon {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .contact-button-text {
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            display: flex;
            align-items: center;
            text-align: center;
            color: #FFFFFF;
        }

        .contact-divider {
            box-sizing: border-box;
            width: 100%;
            height: 64px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
        }

        .contact-info {
            position: absolute;
            left: 0px;
            top: 18px;
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 140%;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.4);
        }

        .contact-footer {
            box-sizing: border-box;
            width: 100%;
            height: 51px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-copyright {
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 19px;
            display: flex;
            align-items: center;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Responsive Design */
        @media (max-width: 1311.98px) {
            .contact-container {
                padding: 40px 32px;
            }
            
            .contact-cards {
                gap: 32px;
            }
            
            .contact-card {
                width: 100%;
                max-width: 400px;
            }
        }

        @media (max-width: 959.98px) {
            .contact-container {
                padding: 24px 16px;
                gap: 48px;
            }
            
            .contact-title {
                font-size: 64px;
            }
            
            .contact-description {
                font-size: 16px;
                line-height: 24px;
            }
            
            .contact-cards {
                flex-direction: column;
                gap: 24px;
            }
            
            .contact-card {
                width: 100%;
                padding: 20px 24px;
            }
            
            .contact-buttons {
                flex-direction: column;
                gap: 12px;
            }
            
            .contact-button {
                width: 100%;
                min-width: auto;
            }
        }

        @media (max-width: 480px) {
            .contact-title {
                font-size: 48px;
            }
            
            .contact-description {
                font-size: 14px;
                line-height: 20px;
            }
        }
    </style>
</head>
<body>
    @include('components.header')
    
    <div class="contact-container">
        <div class="contact-content">
            <div class="contact-header">
                <div class="contact-title-section">
                    <h1 class="contact-title">Contacts</h1>
                    <p class="contact-description">
                        Свяжитесь с нашей командой по любым вопросам. Мы всегда готовы к новым возможностям и сотрудничеству.
                    </p>
                </div>
            </div>

            <div class="contact-cards">
                <!-- Вадим -->
                <div class="contact-card">
                    <div class="contact-card-header">
                        <h3 class="contact-card-name">Вадим</h3>
                        <p class="contact-card-role">Бизнес предложения</p>
                    </div>
                    
                    <div class="contact-buttons">
                        <a href="https://t.me/cephalonowner" class="contact-button telegram" target="_blank">
                            <svg class="contact-button-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.33 7.33L13.33 1.33C13.33 1.33 14.33 0.83 14.33 1.83C14.33 2.33 13.83 2.83 13.83 2.83L11.33 7.83L9.33 13.33C9.33 13.33 9.17 13.83 8.67 13.83C8.17 13.83 7.83 13.33 7.83 13.33L5.33 9.33L1.33 7.33Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="contact-button-text">Telegram</span>
                        </a>
                        
                        <a href="mailto:vadim@cephalon.company" class="contact-button email">
                            <svg class="contact-button-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 4L8 8L14 4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <rect x="1" y="3" width="14" height="10" rx="2" stroke="white" stroke-width="1.5"/>
                            </svg>
                            <span class="contact-button-text">Email</span>
                        </a>
                    </div>
                    
                    <div class="contact-divider">
                        <div class="contact-info">@cephalonowner vadim@cephalon.company</div>
                    </div>
                </div>

                <!-- Тима -->
                <div class="contact-card">
                    <div class="contact-card-header">
                        <h3 class="contact-card-name">Тима</h3>
                        <p class="contact-card-role">Предложения по мерчу</p>
                    </div>
                    
                    <div class="contact-buttons">
                        <a href="https://t.me/CosingByGod" class="contact-button telegram" target="_blank">
                            <svg class="contact-button-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.33 7.33L13.33 1.33C13.33 1.33 14.33 0.83 14.33 1.83C14.33 2.33 13.83 2.83 13.83 2.83L11.33 7.83L9.33 13.33C9.33 13.33 9.17 13.83 8.67 13.83C8.17 13.83 7.83 13.33 7.83 13.33L5.33 9.33L1.33 7.33Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="contact-button-text">Telegram</span>
                        </a>
                        
                        <a href="mailto:merch@cephalon.company" class="contact-button email">
                            <svg class="contact-button-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 4L8 8L14 4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <rect x="1" y="3" width="14" height="10" rx="2" stroke="white" stroke-width="1.5"/>
                            </svg>
                            <span class="contact-button-text">Email</span>
                        </a>
                    </div>
                    
                    <div class="contact-divider">
                        <div class="contact-info">@CosingByGod merch@cephalon.company</div>
                    </div>
                </div>

                <!-- Алина -->
                <div class="contact-card">
                    <div class="contact-card-header">
                        <h3 class="contact-card-name">Алина</h3>
                        <p class="contact-card-role">Музыкальные предложения</p>
                    </div>
                    
                    <div class="contact-buttons">
                        <a href="https://t.me/solfimun" class="contact-button telegram" target="_blank">
                            <svg class="contact-button-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.33 7.33L13.33 1.33C13.33 1.33 14.33 0.83 14.33 1.83C14.33 2.33 13.83 2.83 13.83 2.83L11.33 7.83L9.33 13.33C9.33 13.33 9.17 13.83 8.67 13.83C8.17 13.83 7.83 13.33 7.83 13.33L5.33 9.33L1.33 7.33Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="contact-button-text">Telegram</span>
                        </a>
                        
                        <a href="mailto:alina@cephalon.company" class="contact-button email">
                            <svg class="contact-button-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 4L8 8L14 4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <rect x="1" y="3" width="14" height="10" rx="2" stroke="white" stroke-width="1.5"/>
                            </svg>
                            <span class="contact-button-text">Email</span>
                        </a>
                    </div>
                    
                    <div class="contact-divider">
                        <div class="contact-info">@solfimun alina@cephalon.company</div>
                    </div>
                </div>
            </div>

            <div class="contact-footer">
                <div class="contact-copyright">© 2025 Cephalon Company</div>
            </div>
        </div>
    </div>
</body>
</html>
