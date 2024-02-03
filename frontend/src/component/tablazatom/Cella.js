import KonyvSor from "./KonyvSor";

export default function Cella(props) {
  function torles(e) {
    console.log("Törlöm a(z) " + e + ". könyvet");
    props.torles(e)
  }

  return props.lista.map((e, i) => {
    return <KonyvSor elem={e} key={i} torles={torles} />;
  });
}
