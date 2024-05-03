
const Section1 = ({section, i18n}) => {


  return (
    <section className='w-full'>
        <div className="w-full mt-18 min-h-lvh f-section flex flex-col items-center justify-center">

            <div className="text-white flex flex-col gap-4 w-full px-1">

                <div className="">
                    <h2 className="text-center text-4xl text-blue-1 font-bold sr:text-5xl sm:text-6xl md:text-7xl ">{section.title[i18n.language]}</h2>
                </div>

                <div className="">
                    <h1 className="text-center text-3xl font-bold sr:text-4xl sm:text-5xl md:text-7xl ">{section.subtitle1[i18n.language]}</h1>
                </div>

                <div className="">
                    <h3 className="text-center text-2xl sr:text-2xl sm:3xl md:text-4xl">{section.subtitle2[i18n.language]}</h3>
                </div>

                <div className="w-full sr:w-11/12 sm:w-10/12 md:w-9/12 lg:w-8/12 xl:w-7/12 2xl:w-6/12 mx-auto ">
                    <p className=" text-center text-sm sr:text-lg sm:text-xl md:text-2xl">{section.description[i18n.language]}</p>
                </div>

            </div>

        </div>
    </section>
  )
}

export default Section1