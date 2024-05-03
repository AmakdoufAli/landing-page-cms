import React from 'react';
import './Acceuil.css';
import Section1 from '../../components/Sections/Section1';
import Section2 from '../../components/Sections/Section2';
import Section3 from '../../components/Sections/Section3';
import Section4 from '../../components/Sections/Section4';
import Section5 from '../../components/Sections/Section5';
import { useGetSectionsQuery } from "../../features/apiSlice";
import { useTranslation } from 'react-i18next';
import Navbar from '../../components/Navbar';
import Footer from '../../components/Footer';
import WhatsappContact from '../../components/WhatsappContact';


const Acceuil = ({landing_page_id}) => {
  const { t, i18n } = useTranslation();

  const { data: sections } = useGetSectionsQuery(landing_page_id);

  return (
    sections && (
      <>
        <Navbar landing_page_id={landing_page_id} />

        <Section1 section={sections[0]} i18n={i18n} />

        <Section2 section={sections[1]} i18n={i18n} />

        <Section3 section={sections[2]} i18n={i18n} t={t} />

        <Section4 section={sections[3]} i18n={i18n} />

        <Section5 section={sections[4]} i18n={i18n} />

        <WhatsappContact/>

        <Footer/>
      </>
    )
  )
}

export default Acceuil