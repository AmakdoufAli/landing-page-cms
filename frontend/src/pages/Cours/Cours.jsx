import React, { useEffect, useState } from 'react';
import './Cours.css';
import { Link } from 'react-router-dom';
import Navbar from '../../components/Navbar';
import Footer from '../../components/Footer';

const detailsCours = [
  {
    "id": 1,
    "titre": "Introduction à l'influence artificielle",
    "tires": [
      "Définition et contexte de l'influence artificielle.",
      "Évolution et impact sur les médias sociaux et la société.",
      "Avantages et défis de l'utilisation de l'influence artificielle."
    ]
  },
  {
    "id": 2,
    "titre": "Utilisation d'outils d'IA pour créer des influenceurs/ses artificiels (IA)",
    "tires": [
      "Présentation des outils disponibles, notamment seaart.ai.",
      "Démonstrations pas à pas pour créer des avatars.",
      "Personnalisation et intégration des avatars dans le contenu.",
      "Exercices pratiques pour créer des influenceurs/ses artificiels (IA) authentiques et réels.",
    ]
  },
  {
    "id": 3,
    "titre": "Stratégies de contenu et de narration",
    "tires": [
      "Tendances de contenu et adaptation aux avatars virtuels.",
      "Création de personnages et de scénarios captivants.",
      "Utilisation efficace de la voix et de la personnalité des avatars.",
      "Études de cas sur des campagnes réussies.",
    ]
  },
  {
    "id": 4,
    "titre": "Techniques de monétisation",
    "tires": [
      "Diverses façons de gagner de l'argent avec l'influence artificielle.",
      "Publicité, parrainages et partenariats avec des marques.",
      "Utilisation des médias sociaux pour la monétisation.",
      "Considérations juridiques et fiscales.",
    ]
  },
  {
    "id": 5,
    "titre": "Gestion de la réputation en ligne et éthique",
    "tires": [
      "Transparence et authenticité dans l'influence artificielle.",
      "Gestion des attentes des followers et des risques potentiels.",
      "Éthique de l'utilisation de l'IA dans le marketing.",
      "Conformité aux réglementations en matière de publicité et de protection des consommateurs.",
    ]
  },
]

const Cours = ({t}) => {

  const [detail, setDetail] = useState(1);
  const [dataDetail, setDataDetail] = useState(null);

  useEffect(()=>{
    const fetchData = detailsCours.find(d => d.id === detail);
    setDataDetail(fetchData);
  },[detail]);

  return (
    <div className='w-full'>
      <Navbar landing_page_id={1} />
      <div className="w-full">

        <section className="w-full C-section1 py-2">
          <div className="w-10/12 mx-auto flex flex-col items-center justify-center gap-4 mt-24 h-60">

            <div className="">
              <h1 className='font-extrabold text-2xl sr:text-3xl sm:text-42'>{t('pages.cours.Cours détailles')}</h1>
            </div>

            <div className="font-bold text-base sr:text-lg sm:text-xl">
              <p><Link to={"/"} className='text-blue-1'>{t('pages.Acceuil')}</Link> &gt; {t('pages.cours.Cours')}</p>
            </div>

          </div>
        </section>

        <section className='w-full'>
          <div className="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-0 mx-auto my-12 lg:w-10/12">

            <div className="grid grid-cols-1 gap-y-3 mx-auto w-11/12 ">
              {detailsCours && 
                detailsCours.map(dtls => (
                  <div key={dtls.id} className={`flex flex-row items-center gap-2 p-1 sr:p-2 sm:p-4 border rounded-md cursor-pointer hover:bg-blue-500 hover:text-white ${detail === dtls.id ? 'bg-blue-500 text-white' : '' }`} onClick={()=>{setDetail(dtls.id)}} >
                    <div className="">
                      <img src="icons/next.png" alt="" className='rounded-full min-w-6 max-w-6' />
                    </div>
                    <div className="">
                      <p className='font-medium text-xs sr:text-sm sm:text-lg'>{dtls.titre}</p>
                    </div>
                  </div>
                ))
              }
            </div>
            
            <div className="">
              {dataDetail && 
                <div className="mx-auto w-full p-2 flex flex-col gap-3 sr:w-11/12">

                  <div className="">
                    <h1 className='font-semibold text-xl sr:text-22 sm:text-3xl'>{dataDetail.titre}</h1>
                  </div>

                  <div className="flex flex-col gap-4">
                    {dataDetail.tires &&
                      dataDetail.tires.map((tires, index) => (
                        <div className="flex gap-2 items-start" key={index}>
                          <div className="pt-1">
                            <img src="icons/checkmark.jpg" alt="" className='rounded-full max-w-6 min-w-6' />
                          </div>
                          <div className="">
                            <p className='text-gray-700 sr:text-lg sm:text-xl'>{tires}</p>
                          </div>
                        </div>
                      ))
                    }
                  </div>

                </div>
              }              
            </div>

          </div>
        </section>

      </div>
      <Footer/>
    </div>
  )
}

export default Cours