import React from 'react';
import './Apropos.css';
import { Link } from 'react-router-dom';
import Navbar from '../../components/Navbar';
import Footer from '../../components/Footer';

const Apropos = ({t}) => {


  return (
    <div className='w-full'>
      <Navbar landing_page_id={1} />
      <div className="w-full">

        <section className="w-full A-section1 py-2">
          <div className="w-10/12 mx-auto flex flex-col items-center justify-center gap-4 mt-24 h-60">

            <div className="">
              <h1 className='font-extrabold text-2xl sr:text-3xl sm:text-42'>{t('pages.apropos.À Propos de nous')}</h1>
            </div>

            <div className="font-bold text-base sr:text-lg sm:text-xl">
              <p><Link to={"/"} className='text-blue-1'>{t('pages.Acceuil')}</Link> &gt; {t('pages.apropos.À Propos de nous')}</p>
            </div>

          </div>
        </section>

        <section className='w-full'>
          <div className="mx-auto w-full px-2 sr:w-11/12 sm:w-10/12 md:w-9/12">

            <p className='text-base my-10 text-justify'>
                {t('pages.apropos.text.line1')}<br /><br />

                {t('pages.apropos.text.line2')}<br /><br />

                {t('pages.apropos.text.line3')}<br /><br />

                {t('pages.apropos.text.line4')}<br /><br />

                {t('pages.apropos.text.line5')}
            </p>

          </div>
        </section>

      </div>
      <Footer/>
    </div>
  )
}

export default Apropos