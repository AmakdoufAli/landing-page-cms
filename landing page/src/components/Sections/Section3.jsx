import React from 'react'
import CustumerButton from '../CustumerButton'

const Section3 = ({section, i18n, t}) => {

  return (
    <section className='w-full'>
      <div className="f-section2 rounded-2xl py-7 mx-1 sr:mx-auto sr:w-10/12 sm:w-9/12 sm:py-40 md:w-10/12">
        <div className="text-white flex flex-col items-center justify-center gap-5 w-10/12 mx-auto">
          <h1 className='text-center font-extrabold text-xl sr:text-2xl sm:text-3xl md:text-4xl lg:text-5xl'>{section.title[i18n.language]}</h1>
          <p className='text-center text-sm sr:text-lg sm:text-xl sm:w-10/12 md:text-2xl md:w-9/12 '>{section.description[i18n.language]}</p>
          <CustumerButton link={`/checkout/${section.id_landing_page}`} text={t('Acheter La Formation')} style={{"class": 'bg-black rounded-md hover:bg-red-950 duration-300 py-2 px-4 text-sm sr:py-3 sr:px-6 sr:text-base sm:py-4 sm:px-7 sm:text-lg'}} />
        </div>
      </div>
    </section>
  )
}

export default Section3