import React, { useState } from 'react';
import { IoMdLock } from "react-icons/io";
import PaypalBtn from '../../components/PaypalBtn';
import { useTranslation } from 'react-i18next';
import Navbar from '../../components/Navbar';
import Footer from '../../components/Footer';
import WhatsappContact from '../../components/WhatsappContact';
import { Produit } from '../../assets/images';


const Checkout = ({landing_page}) => {

    const { t, i18n } = useTranslation();

    const [payMethod, setPayMethod] = useState(null);
    const [infos, SetInfos] = useState({email: "", password: "", prenom: "", ville: "", telephone: ""});
    const [errors, setErrors] = useState({});
    const [disable, setDisable] = useState(false);


    const HandelChange = e =>{
        const {name, value} = e.target;
        SetInfos({
            ...infos, [name] : value
        })
    }

    const ChangePayMethod = (e) =>{
        if(validateForm()){
            if(e.target.value === "paypal"){
                setPayMethod("paypal");
                setDisable(true);
            }
            else{
                setPayMethod("payzone");
                setDisable(false);
            }
        }
    }

    const validateForm = () => {
        const validationErrors = {};

        if (!infos.email.trim()) {
            validationErrors.email = t('errors.emailIsRequired');
        } else if (!/\S+@\S+\.\S+/.test(infos.email)) {
            validationErrors.email = t('errors.emailIsNotValid');
        }

        if (!infos.password.trim()) {
            validationErrors.password = t('errors.passwordIsRequired');
        } else if (infos.password.length < 8) {
            validationErrors.password = t('errors.passwordIsInvalid');
        }

        if (!infos.prenom.trim()) {
            validationErrors.prenom = t('errors.prenomIsRequired');
        }

        if (!infos.ville.trim()) {
            validationErrors.ville = t('errors.villeIsRequired');
        }

        if (!infos.telephone.trim()) {
            validationErrors.telephone = t('errors.telephoneIsRequired');
        } else if (!/^0[567]\d{8}$/.test(infos.telephone)) {
            validationErrors.telephone = t('errors.telephoneIsInvalid');
        }

        setErrors(validationErrors);
        return Object.keys(validationErrors).length === 0;
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        validateForm();
    }

  return (
    <div className="w-full">
        <Navbar landing_page_id={landing_page.id} />
        <div className="w-full">

            <div className="w-11/12 mx-auto grid grid-col-1 gap-y-7 lg:grid-cols-2 lg:gap-x-10 mt-32 mb-8">

                <div className="border rounded-md p-4 h-fit">

                    <div className="w-full flex justify-between items-center py-3">
                        <h2 className='text-lg font-bold'>{t('commandeInfo.Votre commande')}</h2>
                        <h2 className='text-lg font-bold'>{t('commandeInfo.Sous total')}</h2>
                    </div>
                    <hr />
                    <div className="w-full flex justify-between items-center py-3">
                        <div className='flex items-center gap-3 justify-center'>
                            <div className=''>
                                <img src={Produit} alt="produit" className='w-24 rounded-xl' />
                            </div>
                            <div className=''>
                                <h3 className='text-base font-semibold'>{landing_page.title[i18n.language]}</h3>
                                <p className='text-xs font-light'>ID: FIA102</p>
                            </div>
                        </div>
                        <h2 className='text-lg font-bold'>{landing_page.price} MAD</h2>
                    </div>
                    <hr />
                    <div className="w-full flex justify-between items-center py-3">
                        <p className='text-base font-medium'>{t('commandeInfo.Sous total')}</p>
                        <p className='text-base font-medium'>{landing_page.price} MAD</p>
                    </div>
                    <hr />
                    <div className="w-full flex justify-between items-center py-3">
                        <p className=''>{t('commandeInfo.Total')}</p>
                        <p className=''>{landing_page.price} MAD</p>
                    </div>

                </div>

                <div className="border rounded-md p-4">
                    <div className="w-full">
                        <form onSubmit={(e)=>{handleSubmit(e)}} className='w-full flex flex-col gap-1'>

                            <div className=''>
                                <h1 className='text-lg font-bold my-3'>{t('clientInfos.Informations Client')}</h1>
                                <hr />
                            </div>

                            <div className="flex items-center gap-4 mt-4">
                                <div className='w-full'>
                                    <label htmlFor="email" className="block mb-2 text-sm font-medium">{t('clientInfos.Entrée votre Adresse e-mail')} <span className='text-red-500'>*</span></label>
                                    <input type="text" id="email" name='email' className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " placeholder={t('clientInfos.Entrée votre Adresse e-mail')}  onChange={(e)=>{HandelChange(e)}} />
                                    <div className='mb-4'>
                                        {errors.email && <p style={{color: "red"}}>{errors.email}</p>}
                                    </div>
                                </div>
                                <div className='w-full'>
                                    <label htmlFor="pwd" className="block mb-2 text-sm font-medium">{t('clientInfos.Mot de passe du compte')} <span className='text-red-500'>*</span></label>
                                    <input type="text" id="pwd" name='password' className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " placeholder={t('clientInfos.Créer le mot de passe du compte')}  onChange={(e)=>{HandelChange(e)}} />
                                    <div className='mb-4'>
                                        {errors.password && <p style={{color: "red"}}>{errors.password}</p>}
                                    </div>
                                </div>
                            </div>

                            <div className=''>
                                <h2 className='text-lg font-bold my-3'>{t('facturationInfos.Détails De Facturation')}</h2>
                                <hr />  
                            </div>

                            <div className="flex items-center gap-4">
                                <div className='w-full'>
                                    <label htmlFor="prenom" className="block mb-2 text-sm font-medium">{t('facturationInfos.Prénom')} <span className='text-red-500'>*</span></label>
                                    <input type="text" id="prenom" name='prenom' className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder={t('facturationInfos.Prénom')}  onChange={(e)=>{HandelChange(e)}} />
                                    <div className='mb-4'>
                                        {errors.prenom && <p style={{color: "red"}}>{errors.prenom}</p>}
                                    </div>
                                </div>
                                <div className='w-full hidden lg:block'></div>
                            </div>

                            <div className="flex items-center gap-4">
                                <div className='w-full'>
                                    <label htmlFor="ville" className="block mb-2 text-sm font-medium">{t('facturationInfos.Ville')} <span className='text-red-500'>*</span></label>
                                    <input type="text" id="ville" name='ville' className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " placeholder={t('facturationInfos.Ville')}  onChange={(e)=>{HandelChange(e)}} />
                                    <div className='mb-4'>
                                        {errors.ville && <p style={{color: "red"}}>{errors.ville}</p>}
                                    </div>
                                </div>
                                <div className='w-full'>
                                    <label htmlFor="tel" className="block mb-2 text-sm font-medium">{t('facturationInfos.Téléphone')} <span className='text-red-500'>*</span></label>
                                    <input type="tel" id="tel" name='telephone' className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " placeholder={t('facturationInfos.Téléphone')}  onChange={(e)=>{HandelChange(e)}} />
                                    <div className='mb-4'>
                                        {errors.telephone && <p style={{color: "red"}}>{errors.telephone}</p>}
                                    </div>
                                </div>
                            </div>

                            <div className=''>
                                <h2 className='text-lg font-bold'>{t('Paiement')}</h2>
                                <hr />
                            </div>

                            <div className='flex items-center '>
                                <div className="w-full flex items-center gap-x-3 m-1 p-1 border-2 border-gray-700 rounded bg-slate-100">
                                    <input id="paypal" name="payment" type="radio" className="h-4 w-4 border-gray-300 cursor-pointer" value={"paypal"} onClick={ChangePayMethod} />
                                    <label htmlFor="paypal" className="block w-full text-sm font-medium text-gray-900 cursor-pointer">Paypal</label>
                                </div>
                                <p>Or</p>
                                <div className="w-full flex items-center gap-x-3 m-1 p-1 border-2 border-gray-700 rounded bg-slate-100">
                                    <input  id="card" name="payment" type="radio" className="h-4 w-4 border-gray-300 cursor-pointer" value={"card"} onClick={ChangePayMethod} />
                                    <label htmlFor="card" className="block w-full text-sm font-medium text-gray-900 cursor-pointer">Payzone</label>
                                </div>
                            </div>
                            {payMethod != null &&
                                <div className='pt-1.5 px-1.5 my-3 flex flex-col justify-center'>
                                    <div style={{ width: '90%', margin:'auto' }}>
                                        {payMethod === "paypal" && <PaypalBtn landing_page={landing_page} userInfos={infos} />}
                                    </div>
                                    {payMethod === "payzone" && <p>Payzone</p>}
                                </div>
                            }
                            
                            <hr />

                            <div style={{ display: disable ? 'none' : 'block' }}>
                                <button type='submit' className='bg-gray-500 w-full my-2 py-2 rounded-md shadow-sm ring-1 ring-gray-300 flex justify-center items-center gap-1 text-white font-semibold'><IoMdLock /> {t('Passer la commande')} {landing_page.price} MAD</button>
                            </div>

                        </form>
                    </div>
                </div>

                <WhatsappContact/>
            </div>
        </div>
        <Footer/>
    </div>
  )
}

export default Checkout