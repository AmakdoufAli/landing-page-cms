import CardSection4 from "../Cards/CardSection4";
import { useGetCardsQuery } from '../../features/apiSlice';

const Section4 = ({ section, i18n }) => {

  const { data: cards } = useGetCardsQuery(section.id);

  return (
    <section className="w-full">
      <div className="py-28 px-1 mx-auto w-full sr:px-0 sr:w-10/12 sm:w-9/12 sm:py-40 md:w-10/12">
        <div className="mb-8">
          <h4 className="text-blue-1 text-center text-lg font-bold">
            {section.title[i18n.language]}
          </h4>
        </div>
        <div className="grid grid-cols-1 gap-y-3 lg:grid-cols-2 lg:gap-3 w-full">
          {cards && cards.map((card, index) => (
            <CardSection4 key={index} card={card} i18n={i18n} />
          ))}
        </div>
      </div>
    </section>
  );
};

export default Section4;