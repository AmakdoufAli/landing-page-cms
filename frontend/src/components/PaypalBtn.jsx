import React from "react";
import { PayPalScriptProvider, PayPalButtons } from "@paypal/react-paypal-js";
import axiosInstance from '../Js/HandlRequest';
import { useNavigate } from "react-router";

const initialOptions = {
    clientId: process.env.REACT_APP_CLIENT_ID,
    currency: process.env.REACT_APP_CURRENCY_CODE,
    intent: process.env.REACT_APP_INTENT,
};

const PaypalBtn = ({userInfos, landing_page}) => {

    const navigate = useNavigate();

    const onCreateOrder = (data, actions) => {
        return actions.order.create({
            purchase_units: [
                {
                    amount: {
                        value: landing_page.price,
                    },
                },
            ],
        });
    };

    const onApproveOrder = (data, actions) => {
        return actions.order.capture().then(function(details) {
            const fetchData = () => {
                axiosInstance.post('/clients', userInfos)
                    .then(async(response) => {
                        const id = await response.data;
                        return axiosInstance.post('/payments', {
                            id_client: id,
                            id_formation: landing_page.id,
                            paymentID: details.id,
                            paymentSource: data.paymentSource,
                            status: details.status,
                            amount_value: details.purchase_units[0].payments.captures[0].amount.value,
                            amount_currency_code: details.purchase_units[0].payments.captures[0].amount.currency_code
                        });
                    })
                    .then(() => {
                        navigate('/succes');
                    })
                    .catch(error => {
                        console.error(error);
                    });
            };
            
            fetchData();
        });
    };


    return (
        <PayPalScriptProvider options={initialOptions}>
                <PayPalButtons
                    style={{
                        layout: "horizontal",
                        tagline: false,
                        color: 'silver'
                    }}
                    createOrder={(data, actions) => onCreateOrder(data, actions)}
                    onApprove={(data, actions) => onApproveOrder(data, actions)}
                />
        </PayPalScriptProvider>
    );
};

export default PaypalBtn;