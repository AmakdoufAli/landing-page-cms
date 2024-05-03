import React, { useState } from 'react';
import './Contact.css';
import { Link } from 'react-router-dom';
import Navbar from '../../components/Navbar';
import Footer from '../../components/Footer';
import { usePostContactNotificationMutation } from '../../features/apiSlice';

const Contact = ({t}) => {

  const [postContactNotification] = usePostContactNotificationMutation();

  const [body, setBody] = useState({});

  const sendContactNotification = (e) => {
    e.preventDefault();
    postContactNotification(body);
    alert('Mail has sent seccessfuly !');
    setBody({nom:"",email:"",telephone:"",message:""});
  }
  
  return (
    <section className='w-full'>
      <Navbar landing_page_id={1} />
      <div className="w-full">

        <section className="w-full Contact-section1 py-2">
          <div className="w-10/12 mx-auto flex flex-col items-center justify-center gap-4 mt-24 h-60">

            <div className="">
              <h1 className='font-extrabold text-2xl sr:text-3xl sm:text-42'>{t('pages.contact.contacter nous')}</h1>
            </div>

            <div className="font-bold text-base sr:text-lg sm:text-xl">
              <p><Link to={"/"} className='text-blue-1'>{t('pages.Acceuil')}</Link> &gt; {t('pages.contact.contacter nous')}</p>
            </div>

          </div>
        </section>

        <section className='w-full'>
          <div className="mx-auto px-3 grid grid-cols-1 gap-y-20 lg:grid-cols-2 my-16 sr:w-11/12 sm:w-10/12">

            <div className="flex flex-col gap-5">
              <div className='text-xl sr:text-2xl sm:text-3xl'>
                <h1 className='font-bold text-gray-1'>{t('pages.contact.Avez-Vous Des Questions ?')}</h1>
              </div>
              <div className='text-base sr:text-lg sm:text-xl'>
                <p className='text-gray-1'>{t('pages.contact.Trouvez des réponses à toutes vos questions.')}</p>
              </div>
            </div>

            <div className="">
              <form className="space-y-8" onSubmit={(e)=>sendContactNotification(e)}>
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
                  <div className='w-full'>
                      <label htmlFor="nom" className="block mb-2 text-sm font-medium">{t('pages.contact.form.Prénom')}</label>
                      <input type="text" value={body.nom} onChange={(e)=>{setBody({...body, nom: e.target.value})}} name="nom" className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " placeholder={t('pages.contact.form.Prénom')} required />
                  </div>
                  <div className='w-full'>
                      <label htmlFor="email" className="block mb-2 text-sm font-medium">{t('pages.contact.form.Votre Email')}</label>
                      <input type="email" value={body.email} onChange={(e)=>{setBody({...body, email: e.target.value})}} name="email" className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " placeholder={t('pages.contact.form.Votre Email')} required />
                  </div>
                </div>
                <div>
                    <label htmlFor="telephone" className="block mb-2 text-sm font-medium">{t('pages.contact.form.Votre Téléphone')}</label>
                    <input type="tel" value={body.telephone} onChange={(e)=>{setBody({...body, telephone: e.target.value})}} name="telephone" className="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder={t('pages.contact.form.Votre Téléphone')} required />
                </div>
                <div className="sm:col-span-2">
                    <label htmlFor="message" className="block mb-2 text-sm font-medium text-gray-900">{t('pages.contact.form.Votre Message')}</label>
                    <textarea value={body.message} onChange={(e)=>{setBody({...body, message: e.target.value})}} name="message" rows="6" className="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300" placeholder="Message ..." required></textarea>
                </div>
                <button type="submit" className="py-3 px-5 text-md font-medium text-center text-white rounded-lg bg-primary-700">{t('pages.contact.form.Envoyer')}</button>
              </form>
            </div>

          </div>
        </section>

      </div>
      <Footer/>
    </section>
  )
}

export default Contact