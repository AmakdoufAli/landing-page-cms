import React from 'react';
import { useTranslation } from 'react-i18next';
import { FaFacebookSquare, FaInstagram, FaTwitter, FaYoutube, FaPhone, FaEnvelope } from "react-icons/fa";
import { Link } from 'react-router-dom';
import { Applogo } from '../assets/images';


const Footer = () => {

    const { t } = useTranslation();

  return (
    <footer className='w-full'>
        <div className='bg-gray-200 flex flex-col w-full mt-20 pt-10 gap-7'>

            <div className="grid grid-cols-1 gap-y-7 mx-auto lg:grid-cols-3 md:w-10/12">

                <div className="mx-auto flex flex-col items-center justify-center gap-3">
                    <div>
                        <Link to={"/"} className="flex items-center space-x-3 rtl:space-x-reverse">
                            <img src={Applogo} className="max-w-14 sr:max-w-16 sm:max-w-20 rounded-full" alt="Logo" />
                        </Link>
                    </div>
                    <div className='flex justify-center items-center gap-3 text-xl sr:text-2xl'>
                        <Link to={"https://web.facebook.com/"} target="_blank"><FaFacebookSquare /></Link>
                        <Link to={"https://www.instagram.com/"} target="_blank"><FaInstagram /></Link>
                        <Link to={"https://twitter.com/"} target="_blank"><FaTwitter /></Link>
                        <Link to={"https://youtube.com"} target="_blank"><FaYoutube /></Link>
                    </div>
                    <div className='flex flex-col text-xs sr:text-lg sm:text-lg'>
                        <div className="flex items-center gap-2">
                            <FaPhone className='' />
                            <span className=''>+212 593546107</span>
                        </div>
                        <div className="flex items-center gap-2">
                            <FaEnvelope className='' />
                            <span className=''>oneClick@gmail.com</span>
                        </div>
                        {/* <div className='flex items-center gap-2 w-52 lg:w-60 lg:text-center'>
                            <FaEnvelope className='w-12' />
                            <span className='text-base'>{t('footer.localisation')}</span>
                        </div> */}
                    </div>
                </div>

                <div className="p-4 grid grid-cols-1 gap-y-5 text-center md:grid-cols-3 lg:col-span-2">
                    <div className="flex flex-col gap-2">
                        <h2 className='font-bold'>{t('footer.Pages principales')}</h2>
                        <ul className='flex flex-col gap-1'>
                            <li className='text-sm sr:text-base font-semibold'><Link className='hover:underline' to={"/"}>{t('navBar.Accueil')}</Link></li>
                            <li className='text-sm sr:text-base font-semibold'><Link className='hover:underline' to={"/apropos"}>{t('navBar.À Propos')}</Link></li>
                            <li className='text-sm sr:text-base font-semibold'><Link className='hover:underline' to={"/cours"}>{t('navBar.Cours')}</Link></li>
                            <li className='text-sm sr:text-base font-semibold'><Link className='hover:underline' to={"/contact"}>{t('navBar.Contactez-Nous')}</Link></li>
                        </ul>
                    </div>
                    <div className="flex flex-col gap-2">
                        <h2 className='font-bold'>{t('footer.Pages juridiques')}</h2>
                        <ul className='flex flex-col gap-1'>
                            <li className='text-sm sr:text-base font-semibold'><Link className='hover:underline' to={"/"}>{t('footer.Politique de confidentialité')}</Link></li>
                            <li className='text-sm sr:text-base font-semibold'><Link className='hover:underline' to={"/"}>{t('footer.Conditions générales de ventes')}</Link></li>
                        </ul>
                    </div>
                    <div className="flex flex-col gap-2">
                        <h2 className='font-bold'>{t('footer.Service client')}</h2>
                        <div className='mx-auto w-10/12 sr:w-9/12 sm:w-8/12'>
                            <p className='text-sm sr:text-base'>{t('footer.description')}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div className="">
                <p className='text-center font-semibold text-gray-700 py-2 text-sm sr:text-base '>{t('footer.copyright')}</p>
            </div>

        </div>
    </footer>
  )
}

export default Footer