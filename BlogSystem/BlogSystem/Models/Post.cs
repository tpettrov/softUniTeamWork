using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace BlogSystem.Models
{
    public class Post
    {
        public Post()
        {
            this.Date = DateTime.Now;
        }

        [Key]
        public int Id { get; set; }

        [Required]
        [StringLength(200)]
        [Display(Name = "Заглавие")]
        public string Title { get; set; }

        [Required]
        [Display(Name = "Текст")]
        [DataType(DataType.MultilineText)]
        public string Body { get; set; }

        [Display(Name = "Автор")]
        [ForeignKey("Author_Id")]
        public ApplicationUser Author { get; set; }
        
        public string Author_Id { get; set; }

        [Required]
        [Display(Name = "Дата")]
        public DateTime Date { get; set; }
    }
}