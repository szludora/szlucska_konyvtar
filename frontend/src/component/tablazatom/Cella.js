import KonyvSor from "./KonyvSor";

export default function Cella(props) {
  function torles(e) {
    console.log("Törlöm a(z) " + e + ". könyvet");
    props.torles(e)
  }
  // ha a props.lista nem null
  return props.lista && props.lista.map((e, i) => {
    return <KonyvSor elem={e} key={i} torles={torles} />;
  });
}
