document.addEventListener("DOMContentLoaded", () => {
  // Données simulées des résultats de matchs pour le Grand Slam de Paris
  const resultats = [
      { id: 1, categorie: "-60kg", genre: "homme", phase: "Finale", judoka1: "Takato Naohisa", judoka2: "Yago Abuladze", score: "10-0", gagnant: "Takato Naohisa" },
      { id: 2, categorie: "-66kg", genre: "homme", phase: "Finale", judoka1: "Abe Hifumi", judoka2: "Vazha Margvelashvili", score: "1-0", gagnant: "Abe Hifumi" },
      { id: 3, categorie: "-73kg", genre: "homme", phase: "Finale", judoka1: "Ono Shohei", judoka2: "Tsogtbaatar Tsend-Ochir", score: "10-0", gagnant: "Ono Shohei" },
      { id: 4, categorie: "-81kg", genre: "homme", phase: "Finale", judoka1: "Nagase Takanori", judoka2: "Matthias Casse", score: "1-0", gagnant: "Nagase Takanori" },
      { id: 5, categorie: "-90kg", genre: "homme", phase: "Finale", judoka1: "Noel Van T End", judoka2: "Mikhail Igolnikov", score: "10-0", gagnant: "Noel Van T End" },
      { id: 6, categorie: "-100kg", genre: "homme", phase: "Finale", judoka1: "Wolf Aaron", judoka2: "Cho Guham", score: "10-0", gagnant: "Wolf Aaron" },
      { id: 7, categorie: "+100kg", genre: "homme", phase: "Finale", judoka1: "Krpalek Lukas", judoka2: "Harasawa Hisayoshi", score: "1-0", gagnant: "Krpalek Lukas" },
      { id: 8, categorie: "-48kg", genre: "femme", phase: "Finale", judoka1: "Tonaki Funa", judoka2: "Munkhbat Urantsetseg", score: "10-0", gagnant: "Tonaki Funa" },
      { id: 9, categorie: "-52kg", genre: "femme", phase: "Finale", judoka1: "Abe Uta", judoka2: "Amandine Buchard", score: "10-0", gagnant: "Abe Uta" },
      { id: 10, categorie: "-57kg", genre: "femme", phase: "Finale", judoka1: "Yoshida Tsukasa", judoka2: "Jessica Klimkait", score: "10-0", gagnant: "Yoshida Tsukasa" },
      { id: 11, categorie: "-63kg", genre: "femme", phase: "Finale", judoka1: "Tashiro Miku", judoka2: "Clarisse Agbegnenou", score: "0-10", gagnant: "Clarisse Agbegnenou" },
      { id: 12, categorie: "-70kg", genre: "femme", phase: "Finale", judoka1: "Arai Chizuru", judoka2: "Barbara Matic", score: "10-0", gagnant: "Arai Chizuru" },
      { id: 13, categorie: "-78kg", genre: "femme", phase: "Finale", judoka1: "Ham