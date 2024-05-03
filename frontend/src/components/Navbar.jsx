import React, { useState } from 'react';
import { Link, useLocation } from 'react-router-dom';
import CustumerButton from './CustumerButton';
import { useTranslation } from 'react-i18next';
import i18n from '../Js/I18n';
import { Applogo } from '../assets/images';

function Navbar(landing_page_id) {

  const { t } = useTranslation();

  const location = useLocation();

  const [isMenuOpen, setIsMenuOpen] = useState(false);

  const toggleMenu = () => {
    setIsMenuOpen(!isMenuOpen);
  };

  return (
    <div className="bg-white border-gray-200 fixed w-full z-20 top-0 start-0 border-b">
      <div className="flex items-center justify-between flex-nowrap mx-auto py-4 w-full md:w-11/12">

        <Link to={"/"}>
          <img src={Applogo} className="max-w-11 sr:max-w-12 sm:max-w-14 rounded-full" alt="Logo" />
        </Link>

        <div className="hidden lg:block">
          <ul className="flex gap-6">
            <li className={`lg:py-5`}>
              <Link to={'/'} className={`font-bold text-gray-800 px-2 py-7 ${location.pathname === '/' ? 'lg:border-blue-700 lg:border-b-2' : ''}`} onClick={()=>{setIsMenuOpen(false)}}>{t('navBar.Accueil')}</Link>
            </li>
            <li className={`lg:py-5`}>
              <Link to={'/apropos'} className={`font-bold text-gray-800 px-2 py-7 ${location.pathname === '/apropos' ? 'lg:border-blue-700 lg:border-b-2' : ''}`} onClick={()=>{setIsMenuOpen(false)}}>{t('navBar.À Propos')}</Link>
            </li>
            <li className={`lg:py-5`}>
              <Link to={'/cours'} className={`font-bold text-gray-800 px-2 py-7 ${location.pathname === '/cours' ? 'lg:border-blue-700 lg:border-b-2' : ''}`} onClick={()=>{setIsMenuOpen(false)}}>{t('navBar.Cours')}</Link>
            </li>
            <li className={`lg:py-5`}>
              <Link to={'/contact'} className={`font-bold text-gray-800 px-2 py-7 ${location.pathname === '/contact' ? 'lg:border-blue-700 lg:border-b-2' : ''}`} onClick={()=>{setIsMenuOpen(false)}}>{t('navBar.Contactez-Nous')}</Link>
            </li>
          </ul>
        </div>

        <div className="flex items-center gap-4">
          {(location.pathname !== '/' && location.pathname !== '/apropos' && location.pathname !== '/cours' && location.pathname !== '/contact' && location.path !== '/succes') && (
            <CustumerButton link={`/checkout/${landing_page_id.landing_page_id}`} text={t('Acheter La Formation')} style={{class: 'bg-blue-600 py-2 px-4 rounded-full text-white font-bold hover:bg-gray-300 hover:text-black duration-300 min-w-56 hidden sm:block'}} />
          )}
          
          <div className=''>
            <select name="lng" id="lng" onChange={(e)=>{i18n.changeLanguage(e.target.value)}}>
              <option value="fr">Fr</option>
              <option value="en">En</option>
            </select>
          </div>
          <button
              type="button"
              className="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden"
              onClick={toggleMenu}
              aria-expanded={isMenuOpen ? "true" : "false"}
            >
              <svg className="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>

          <div className={`absolute top-16 sr:top-16 sm:top-20 left-0 items-center justify-between w-full lg:flex lg:w-auto lg:order-1 bg-gray-50 pb-5 ${isMenuOpen ? 'block' : 'hidden'}`} id="navbar-sticky">
            <ul className="flex flex-col p-4 lg:p-0 font-medium border border-gray-100 rounded-lg lg:space-x-8 rtl:space-x-reverse md:flex-wrap gap-2 lg:hidden">
              <li className={`border rounded-lg hover:bg-gray-400 hover:text-white`}>
                <Link to={'/'} className={`block p-3 md:hover:bg-transparent ${location.pathname === '/' ? 'bg-gray-400 text-white rounded-lg' : 'bg-gray-100'}`} onClick={()=>{setIsMenuOpen(false)}}>{t('navBar.Accueil')}</Link>
              </li>
              <li className={`border rounded-lg hover:bg-gray-400 hover:text-white`}>
                <Link to={'/apropos'} className={`block p-3 md:hover:bg-transparent ${location.pathname === '/apropos' ? 'bg-gray-400 text-white rounded-lg' : 'bg-gray-100'}`} onClick={()=>{setIsMenuOpen(false)}}>{t('navBar.À Propos')}</Link>
              </li>
              <li className={`border rounded-lg hover:bg-gray-400 hover:text-white`}>
                <Link to={'/cours'} className={`block p-3 md:hover:bg-transparent ${location.pathname === '/cours' ? 'bg-gray-400 text-white rounded-lg' : 'bg-gray-100'}`} onClick={()=>{setIsMenuOpen(false)}}>{t('navBar.Cours')}</Link>
              </li>
              <li className={`border rounded-lg hover:bg-gray-400 hover:text-white`}>
                <Link to={'/contact'} className={`block p-3 md:hover:bg-transparent ${location.pathname === '/contact' ? 'bg-gray-400 text-white rounded-lg' : 'bg-gray-100'}`} onClick={()=>{setIsMenuOpen(false)}}>{t('navBar.Contactez-Nous')}</Link>
              </li>
            </ul>
            {(location.pathname !== '/' && location.pathname !== '/apropos' && location.pathname !== '/cours' && location.pathname !== '/contact' && location.path !== '/succes') && (
              <CustumerButton link={`/checkout/${landing_page_id.landing_page_id}`} text={t('Acheter La Formation')} style={{class: 'bg-blue-600 py-2 px-4 rounded-full text-white font-bold hover:bg-gray-300 hover:text-black duration-300 min-w-56 block mx-auto mt-3 sm:hidden'}} />
            )}
          </div>

        </div>

      </div>
    </div>
  );
}

export default Navbar;