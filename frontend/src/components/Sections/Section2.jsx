import CardSection2 from '../Cards/CardSection2';
import { useGetCardsQuery } from '../../features/apiSlice';

const Section2 = ({section, i18n}) => {

  const { data: cards } = useGetCardsQuery(section.id);

  return (
    <section className='w-full'>
      <div className="my-20 mx-auto w-11/12 sr:w-10/12 sm:w-9/12 md:w-8/12 lg:w-10/12">
        <div className=''>
          <h4 className='text-lg text-blue-1 font-bold text-center'>{section.title[i18n.language]}</h4>
        </div>
        <div className='mt-3 mb-10'>
          <h2 className='text-center text-gray-800 font-semibold text-xl sr:text-2xl sm:text-3xl md:text-4xl'>{section.subtitle1[i18n.language]}</h2>
        </div>
        <div className="grid grid-cols-1 mx-auto lg:grid-cols-3 w-full gap-6">
          {cards && cards.map((card, index) => (
              <CardSection2 key={index} card={card} i18n={i18n} />
            ))
          }
        </div>
      </div>
    </section>
  )
}

export default Section2