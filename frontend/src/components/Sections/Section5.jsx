import CardSection5 from "../Cards/CardSection5";
import { useGetCardsQuery } from '../../features/apiSlice';
import { S3i1 } from "../../assets/images";

const Section5 = ({section, i18n}) => {

  const { data: cards } = useGetCardsQuery(section.id);

  return (
    <section className='w-full'>
      <div className="grid grid-cols-1 mx-auto w-full md:grid-cols-2 md:items-center sr:w-11/12 sm:w-9/12 sm:py-40 md:w-10/12 ">
        <div className="">
          <img src={S3i1} alt="" className='mx-auto w-8/12 sr:max-w-80  ' />
        </div>
        <div className="grid grid-col-1 gap-4 mx-auto px-2 w-11/12 sr:w-10/12 ">
          <div className="">
            <h3 className='font-medium text-gray-1 text '>{section.title[i18n.language]}</h3>
          </div>
          <div className="">
            <p className='font-semibold text-gray-700 text-justify text-xs'>{section.description[i18n.language]}</p>
          </div>
          <div className="flex flex-col gap-2">
            {cards && cards.map((card, index) => (
              <CardSection5 key={index} card={card} i18n={i18n} />
            ))}
          </div>
        </div>
      </div>
    </section>
  )
}

export default Section5