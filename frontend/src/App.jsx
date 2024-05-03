import { BrowserRouter, Routes, Route } from "react-router-dom";
import { useGetLandingPagesQuery } from "./features/apiSlice";
import Conditions from "./pages/Conditions/Conditions";
import SuccesPayment from "./components/SuccesPayment";
import Politique from "./pages/Conditions/Politique";
import Checkout from "./pages/Checkout/Checkout";
import { I18nextProvider } from "react-i18next";
import { useTranslation } from 'react-i18next';
import Acceuil from "./pages/Acceuil/Acceuil";
import Apropos from "./pages/Apropos/Apropos";
import Contact from "./pages/Contact/Contact";
import Cours from "./pages/Cours/Cours";
import Home from "./pages/Home/Home";
import i18n from "./Js/I18n";
import React from "react";
import "./App.css";

function App() {
  const { t } = useTranslation();

  const { data: landing_pages } = useGetLandingPagesQuery();

  return (
  <I18nextProvider i18n={i18n}>
    <BrowserRouter>
      <Routes>
        <Route path={"/"} element={<Home lps={landing_pages && landing_pages} />} />
        {landing_pages &&
          landing_pages.map( landing_page => (
            <React.Fragment key={landing_page.id}>
              <Route element={<Acceuil landing_page_id={landing_page.id} />} path={landing_page.link} />
              <Route element={<Checkout landing_page={landing_page} />}      path={`/checkout/${landing_page.id}`} />
            </React.Fragment>
          ))
        }
        <Route path={"/apropos"} element={<Apropos t={t} />} />
        <Route path={"/cours"} element={<Cours t={t} />} />
        <Route path={"/contact"} element={<Contact t={t} />} />
        <Route path={"/politique"} element={<Politique t={t} />} />
        <Route path={"/conditions"} element={<Conditions t={t} />} />
        <Route path={"/succes"} element={<SuccesPayment t={t} />} />
      </Routes>
    </BrowserRouter>
  </I18nextProvider>
  );
}

export default App;